<?php
namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Models\Task;

class TaskController extends BaseController {

    private $taskModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->taskModel = new Task();
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $tasks = $this->taskModel->getAll($_SESSION['user_id']);
        $this->render('front/tasks', ['tasks' => $tasks]);
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($title) || empty($description)) {
                return $this->render('front/tasks-create', ['error' => 'Başlık ve açıklama gereklidir.']);
            }

            if ($this->taskModel->create($title, $description, $_SESSION['user_id'])) {
                return $this->render('front/tasks-create', ['success' => 'Görev başarıyla oluşturuldu.']);
            } else {
                return $this->render('front/tasks-create', ['error' => 'Görev oluşturulurken hata oluştu.']);
            }
        }

        return $this->render('front/tasks-create');
    }

    public function update($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $task = $this->taskModel->getById($id, $_SESSION['user_id']);
        if (!$task) {
            header('Location: /tasks');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($title) || empty($description)) {
                return $this->render('front/tasks-update', ['error' => 'Başlık ve açıklama gereklidir.', 'task' => $task]);
            }

            if ($this->taskModel->update($id, $title, $description, $_SESSION['user_id'])) {
                return $this->render('front/tasks-update', ['success' => 'Görev başarıyla güncellendi.', 'task' => $task]);
            } else {
                return $this->render('front/tasks-update', ['error' => 'Görev güncellenirken hata oluştu.', 'task' => $task]);
            }
        }

        return $this->render('front/tasks-update', ['task' => $task]);
    }

    public function delete($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($this->taskModel->delete($id, $_SESSION['user_id'])) {
            header('Location: /tasks');
            exit;
        } else {
            $tasks = $this->taskModel->getAll($_SESSION['user_id']);
            return $this->render('front/tasks', ['error' => 'Görev silinirken hata oluştu.', 'tasks' => $tasks]);
        }
    }
}
