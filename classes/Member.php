<?php
    class Member {
        private $conn;
        private $table = 'members';

        public function __construct()
        {
            $db = new Database;
            $this->conn = $db->getConnection();
        }

        public function getAll() {
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->conn->prepare($query);
            
            if($stmt->execute()) {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }

            return false;
        }
    }
?>