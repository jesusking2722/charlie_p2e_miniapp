<?php
class connect_db {
    public function connect() {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'akrkwkmy_nm407797_charlie';
        $port = "3306";
        $connection = new mysqli($host, $user, $pass, $db, $port);
        
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        
        $connection->set_charset('utf8');
        return $connection;
    }
}