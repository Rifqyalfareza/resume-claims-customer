<?php
session_start();
require_once '../config/db.php';
require_once '../models/User.php';

class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        $this->db = Database::connect();
        $this->userModel = new UserModel($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->authenticate($username, $password);

            if ($user) {
                $_SESSION['id_admin'] = $user['id_admin'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['success'] = "Login successful";
                header("Location: ../index.html");
                exit();
            } else {
                $_SESSION['error'] = "Wrong username or password";
                header("Location: ../index.html");
                exit();
            }
        }
    }
}

$controller = new AuthController();
$controller->login();
?>