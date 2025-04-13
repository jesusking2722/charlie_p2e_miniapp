<?php
class connect_db {
    public function connect() {
        $host = 'shortline.proxy.rlwy.net';
        $user = 'root';
        $pass = 'sSUwJKajVUtOwrHNWbvyWZdNeZojJVjT';
        $db = 'charlie';
        $port = "50436";
        $connection = new mysqli($host, $user, $pass, $db, $port);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        
        $connection->set_charset('utf8');
        return $connection;
    }
}