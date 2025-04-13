<?php
include 'connect_db.php';
class init_db extends connect_db {
    private $conn; 
    public function __construct() { 
       $dbcon = new parent(); 
       // this is not needed in your case
       // you can use $this->conn = $this->connect(); without calling parent()
       $this->conn = $dbcon->connect();
    }

    public function select( $table , $where='' , $other='' ){
       if($where != '' ){  
         $where = 'where ' . $where; 
       }
       $where=str_replace("updatexml","",$where);
       $where=str_replace("concat","",$where);
       $where=str_replace("select","",$where);
       $where=str_replace("update","",$where);
       $where=str_replace("insert","",$where);
       $where=str_replace("nm407797_energy","",$where);
       $sql = "SELECT * FROM  ".$table." " .$where. " " .$other;
       $sele = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
       return $sele;
    }

    public function close(){
       $connz=$this->conn;
       $connz->close();
    }

    public function insert( $table , $fields , $values){
       $sql = "INSERT INTO ".$table." (" .$fields. ") VALUES (" .$values.");";
       $inse = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
       return $inse;
    }

    public function _insert_db_data( $tname, $data )
      {
        $columns = array(); $values = array();
        foreach($data as $column => $value)
        {
          $columns[] = "`". $column ."`";
          $values[] = "'". $value ."'";
        }
        $columns = implode(",", $columns);
        $values = implode(",", $values);
 echo "INSERT INTO ". $tname ." ($columns) VALUES ($values)";
        return mysqli_query($this->conn, "INSERT INTO ". $tname ." ($columns) VALUES ($values)");

        mysqli_close($this->conn);
      }

    public function update( $table , $sqls , $where){
       $sql = "UPDATE ".$table." SET " .$sqls. " WHERE " .$where.";";
       $inse = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
       return $inse;
    }
    public function _update_db_data( $table , $data, $where){
      $columns = "";
        foreach($data as $column => $value)
        {
          $columns.= "`". $column ."` = '". $value ."',";
        }
        $columns = substr($columns,0,-1);
        #print_r("UPDATE ". $table ." SET $columns WHERE ".$where."");exit();

        return mysqli_query($this->conn, "UPDATE ". $table ." SET $columns WHERE ".$where."");

        mysqli_close($this->conn);


       # $select_user = $mysqli->update("users" , "name = '".$data[name]."',age = '".$data[age]."',sex = '".$data[sex]."',city = '".$data[city]."'", "id='".$_SESSION[user]."'") or die('Error DB');     
    }
    public function delete( $table , $where){
       $sql = "DELETE FROM ".$table." WHERE " .$where.";";
       $inse = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
       return $inse;
    }
    public function last_insert_id(){
       return mysqli_insert_id($this->conn);
    }
   }
?>