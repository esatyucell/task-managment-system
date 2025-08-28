<?php
namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Models\User;

class AuthController extends BaseController {

    private $userModel;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            if (empty($username) || empty($password)) {
                return $this->render('front/login', ['error' => 'Kullanıcı adı ve şifre gereklidir.']);
            }

            $user = $this->userModel->verify($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /tasks');
                exit;
            } else {
                return $this->render('front/login', ['error' => 'Kullanıcı adı veya şifre hatalı.']);
            }

        } else {
            return $this->render('front/login');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;
            $confirm  = $_POST['confirm'] ?? null;

            if (empty($username) || empty($password) || empty($confirm)) {
                return $this->render('front/register', ['error' => 'Tüm alanlar gereklidir.']);
            }

            if ($password !== $confirm) {
                return $this->render('front/register', ['error' => 'Şifreler uyuşmuyor.']);
            }

            try {
                $created = $this->userModel->create($username, $password);
                if ($created) {
                    return $this->render('front/register', ['success' => 'Kayıt başarılı. Giriş yapabilirsiniz.']);
                } else {
                    return $this->render('front/register', ['error' => 'Kayıt sırasında bir hata oluştu.']);
                }
            } catch (\Exception $e) {
                return $this->render('front/register', ['error' => 'Kayıt sırasında bir hata oluştu: ' . $e->getMessage()]);
            }

        } else {
            return $this->render('front/register');
        }
    }
}
