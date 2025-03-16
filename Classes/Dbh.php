<?php

class Dbh {
    public function connect() {
        try {
            $servername = "localhost";
            $username = "root";
            $password = "Podlaga55#";
            $conn = new PDO("mysql:host=$servername;dbname=project", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
}