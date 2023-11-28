<?php
class DAO {
    private $con;
 function construct($user,$pass, $db) {
     $host = "localhost";
     $this->con = mysqli_connect($host, $user, $pass, $db);
 }

 public function query($sql) {
//     mysqli_query($this->con, "set names 'utf-8");
     $rs = $this->query($sql);
     return $rs;
 }
 public function table($sql , $header) {
     $rs = $this->query($sql);
     $field_info = mysqli_fetch_field($rs);
     $str = "<table><tr>";
     foreach ($field_info as $val) {
         $name =$val->name;
         $str .= "<th>".$name."</th>";
     }
     $str .= "</tr>";
     while ($r = mysqli_fetch_array($rs)) {
         $str .= "<tr>";
         foreach ($field_info as $value) {
             $name = $value->name;
             $str .= "<td>".$r[$name]."</td>";
             
         }
         $str .= "</tr>";
     }
     $str .= "</table>";
     echo "<h3>{$header}</h3>";
     echo $str;


 }
}
?>