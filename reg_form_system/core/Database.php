<?php
class Database {
    protected function connect() {
    try {
        $username = "root";
        $password = "";
        $dbh = new PDO("mysql:host=localhost;dbname=reg_form", $username, $password);
        return $dbh;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}
}