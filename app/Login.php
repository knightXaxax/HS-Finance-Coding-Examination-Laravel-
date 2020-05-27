<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    private $db = null;

    public function __construct()
    {
        $this->db = DB::connection('laravest')->getPdo();
    }

    public function select($query, $placeholders)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($placeholders);
        return $stmt;
    }

    public function verify($params)
    {
        $response = [];

        $fetch_data = $this->select("SELECT `id`, `password`, `fullname`, `profile_picture_path` FROM `personal_information` WHERE `email` = :email;", [
            ':email' => $params['email'],
        ])->fetch();

        if(!is_array($fetch_data))
        {
            $response['msg'] = "email_error";
        } else {
            if(!password_verify($params['password'], $fetch_data['password'])) {
                $response['msg'] = "password_error";
            } else {
                $response['msg'] = "success";
                $response['id'] = $fetch_data['id'];
                $response['fullname'] = $fetch_data['fullname'];
                $response['profile_picture_path'] = $fetch_data['profile_picture_path'];
            }
        }
        return $response;
    }
}
