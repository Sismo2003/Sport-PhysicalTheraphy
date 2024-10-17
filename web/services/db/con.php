<?php
define("HOST",'5.161.211.225'); // DataBase Ipv4
define("BD",'root'); // Table name
define("USER_BD",'vicidialnow'); // Database Username
define("PASS_BD",'spt');



function connection(){
    $con = new mysqli(HOST,USER_BD,PASS_BD,BD);
    if($con->connect_error){
        die("Fail connection: " . $con->connect_error);
    }else{
        return $con;
    }
}

?>