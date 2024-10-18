<?php
define("HOST",'5.161.211.225'); // DataBase Ipv4
define("BD",'spt'); // Table name spt
define("USER_BD",'root'); // Database Username root
define("PASS_BD",'vicidialnow');



function connection(){
    $con = new mysqli(HOST,USER_BD,PASS_BD,BD);
    if($con->connect_error){
        die("Fail connection: " . $con->connect_error);
    }else{
        return $con;
    }
}

?>