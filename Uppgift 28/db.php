<?php
    class DBConnection {
        private $pdo;

        function __construct($db_name, $username = "root", $password = "root", $host = "127.0.0.1", $charset = "UTF8") {
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            ];
            $dsn = 'mysql:host='.$host.';dbname='.$db_name.';charset='.$charset;
            $this->pdo = new PDO($dsn, $username, $password, $options);
        }

        function getPDO() {
            return $this->pdo;
        }

        function createEntry($firstname, $lastname, $email, $phone_number) {
            $stmt = $this->pdo->prepare("INSERT INTO entries (firstname, lastname, email, phone_number) VALUES (:firstname, :lastname, :email, :phone_number)");
            if($stmt->exec([":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":phone_number" => $phone_number])) {
                return true;
            }
            
            return false;
        }
    }
?>