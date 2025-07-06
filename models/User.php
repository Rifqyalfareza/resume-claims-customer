<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($username, $password) {
        $sql = "SELECT * FROM admin WHERE username = :username and password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => $password
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }
        return false;
    }
}
?>