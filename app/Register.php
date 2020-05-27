<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Support\Facades\Storage;

class Register extends Model
{
    private $db = null;

    public function __construct()
    {
        $this->db = DB::connection('laravest')->getPdo();
    }

    public function checkEmailIfExists($email)
    {
        $stmt = $this->db->prepare("SELECT `id` FROM `personal_information` WHERE email = :email;");
        $stmt->execute([
            ':email' => $email,
        ]);
        return $stmt ? $stmt : 0;
    }

    public function details($params)
    {
        $fullname = trim($params['firstname'])." ".trim($params['middlename'])." ".trim($params['surname']);
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("INSERT INTO `personal_information` VALUES (0, :fullname, :age, :email, :passwd, :profile_picture_path);");
            $stmt->execute([
                ':fullname' => $fullname,
                ':age' => $params['age'],
                ':email' => $params['email'],
                ':passwd' => password_hash($params['password'], PASSWORD_DEFAULT),
                ':profile_picture_path' => "storage/".substr(Storage::putFile('public/'.$params['email'], $params['profile_picture'], 'public'), 7),
            ]);
            $this->db->commit();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollback();
            return $e->getMessage();
        }
    }
}
