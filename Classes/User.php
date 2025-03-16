<?php

class User extends Dbh {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function insertUser() {
        $qr = parent::connect()->prepare("SELECT * FROM uporabniki WHERE username = :uname");
        $qr->bindParam(":uname", $this->username);
        $qr->execute();
        $result = $qr->fetchAll(\PDO::FETCH_ASSOC);
        
        if ($result) {
            echo '<p>This username already exist<p> <hr>';
        } else {
        
            $stm = parent::connect()->prepare("INSERT INTO uporabniki(username, password) VALUES(:username, :password)");
            $stm->bindParam(":username", $this->username);
            $stm->bindParam(":password", sha1($this->password));
            $stm->execute();
            $stm = null;
            header("Location: " . $_SERVER['PHP_SELF']);
            die();
        }
    }

    public function signupUser() {
        if (isset($this->username) && isset($this->password)) {
            $this->insertUser();
        }
    }


    public function login() {

        $stm = parent::connect()->prepare("SELECT * FROM uporabniki WHERE username = :username AND password = :password");
        $hashed = sha1($this->password);

        $stm->bindParam(":username", $this->username);
        $stm->bindParam(":password", $hashed);
        $stm->execute();

        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        if ($result) {
            echo '<p>You have successfully logged in</p> <hr>';
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['username'] = $result[0]['username'];

        } else {
            echo '<p>Wrong username or password</p> <hr>';
        }

        $stm = null;
    }
}
