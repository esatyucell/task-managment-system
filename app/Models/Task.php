<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Task {
    private $db;

    public function __construct() {
        // PDO bağlantısını Database singleton üzerinden alıyoruz
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id, $user_id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id AND user_id = :user_id LIMIT 1");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $description, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO tasks (title, description, user_id) VALUES (:title, :description, :user_id)");
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id
        ]);
    }

    public function update($id, $title, $description, $user_id) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :id AND user_id = :user_id");
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'id' => $id,
            'user_id' => $user_id
        ]);
    }

    public function delete($id, $user_id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = :id AND user_id = :user_id");
        return $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
