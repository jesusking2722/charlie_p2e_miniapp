<?php
class connect_db{
    public function connect(){
        $host = 'centerbeam.proxy.rlwy.net';
        $user = 'root';
        $pass = 'ZmnkAMOHPZMWSvUcfeVkstRlveyUlsgl';
        $db = 'charlie';
        $port = '37545';
        $connection = mysqli_connect($host,$user,$pass,$db, $port); 
        $connection->set_charset('utf8');
        return $connection;
     }
}