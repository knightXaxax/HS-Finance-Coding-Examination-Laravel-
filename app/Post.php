<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Support\Facades\Storage;

class Post extends Model
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

    public function specific_post($post_id)
    {
        return $this->select("SELECT * FROM `posts` WHERE id=:id;", [':id' => $post_id])->fetch();
    }

    public function delete_by_id($post_id)
    {
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("DELETE FROM `posts` WHERE id=:id;");
            $stmt->execute([':id' => $post_id]);
            $this->db->commit();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollback();
            return $e->getMessage();
        }
    }

    public function add($params)
    {
        $person = $this->select("SELECT `email` FROM `personal_information` WHERE id=:id;", [
            ':id' => $params['person_id'],
        ])->fetch();
        try {
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("INSERT INTO `posts` VALUES (0, :person_id, :title, :content, :img_name, :img, TIMESTAMP(NOW()));");
            $stmt->execute([
                ':person_id' => $params['person_id'],
                ':title' => $params['title'],
                ':content' => json_encode($params['post_creator']),
                ':img' => "storage/".substr(Storage::putFile('public/'.$person['email'], $params['image_thumbnail_post'], 'public'), 7),
                ':img_name' => trim($params['image_thumbnail_post']->getClientOriginalName()),
            ]);
            $this->db->commit();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollback();
            return $e->getMessage();
        }
    }

    public function update_by_id($params)
    {
        try {
            $old_img_name = $this->select("SELECT `image_name` from `posts` WHERE id=:id", [
                ':id' => $params['post_id'],
            ])->fetch()['image_name'];

            $old_img_path_name = $this->select("SELECT `image_thumbnail_path` from `posts` WHERE id=:id", [
                ':id' => $params['post_id'],
            ])->fetch()['image_thumbnail_path'];

            $this->db->beginTransaction();

            if(trim($old_img_name) == trim($params['image_thumbnail_post_update'])) {
                $stmt = $this->db->prepare("UPDATE `posts` SET  title=:title, content=:content WHERE id=:post_id;");
                $stmt->execute([
                    ':post_id' => $params['post_id'],
                    ':title' => $params['title_post_update'],
                    ':content' => json_encode($params['post_creator_update']),
                ]);
            } else {
                $stmt = $this->db->prepare("UPDATE `posts` SET  title=:title, content=:content, image_name=:img_name, image_thumbnail_path=:img WHERE id=:post_id;");
                $stmt->execute([
                    ':post_id' => $params['post_id'],
                    ':title' => $params['title_post_update'],
                    ':content' => json_encode($params['post_creator_update']),
                    ':img' => "storage/".substr(Storage::putFile('public/'.$params['email'], $params['image_thumbnail_post_update'], 'public'), 7),
                    ':img_name' => trim($params['image_thumbnail_post_update']->getClientOriginalName()),
                ]);
            }
            $this->db->commit();
            return $stmt;
        } catch (PDOException $e) {
            $this->db->rollback();
            return $e->getMessage();
        }
    }
}
