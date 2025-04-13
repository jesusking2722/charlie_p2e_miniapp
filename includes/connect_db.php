<?php
class connect_db{
    public function connect(){
        $host = 'localhost';
        $user = 'akrkwkmy_charlie';
        $pass = 'success$123';
        $db = 'akrkwkmy_nm407797_charlie';
        $connection = mysqli_connect($host,$user,$pass,$db); 
        $connection->set_charset('utf8');
        return $connection;
     }
}