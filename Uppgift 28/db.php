<?php
require "./entry.php";
class DBConnection {
    private $pdo;

    public function __construct($db_name, $username = "root", $password = "root", $host = "127.0.0.1", $charset = "UTF8") {
        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';charset=' . $charset;
        $this->pdo = new PDO($dsn, $username, $password, $options);
    }

    public function getPDO() {
        return $this->pdo;
    }

    public function createEntry($firstname, $lastname, $email, $phone_number) {
        $stmt = $this->pdo->prepare("INSERT INTO entries (firstname, lastname, email, phone_number) VALUES (:firstname, :lastname, :email, :phone_number)");
        if ($stmt->execute([":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":phone_number" => $phone_number])) {
            return true;
        }

        return false;
    }

    public function getEntries() {
        $result = array();

        $stmt = $this->pdo->prepare("SELECT * FROM entries");
        if($stmt->execute()) {
            while($r = $stmt->fetch()) {
                array_push($result, new Entry($r['id'], $r['timestamp'], $r['firstname'], $r['lastname'], $r['email'], $r['phone_number']));
            }
        }

        return $result;
    }

    public function canCreateEntry($firstname, $lastname, $email, $phone_number) {
        $stmt = $this->pdo->prepare("SELECT count(*) FROM entries WHERE (firstname = :firstname and lastname = :lastname) or email = :email or phone_number = :phone_number");
        if ($stmt->execute([":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":phone_number" => $phone_number])) {
            if(intval($stmt->fetchColumn()) == 0) {
                return true;
            }
        }

        return false;
    }
}
