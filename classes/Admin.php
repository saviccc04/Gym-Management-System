<?php
    class Admin {
        private $conn;
        private $table = 'admins';

        public function __construct()
        {
            $db = new Database;
            $this->conn = $db->getConnection();
        }

        public function login($username, $password) {
            $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':username', $username);
            $stmt->execute();

            $admin = $stmt->fetch(PDO::FETCH_OBJ);

            if(password_verify($password, $admin->password)) {
                return true;
            }

            return false;
        }
    }
?>