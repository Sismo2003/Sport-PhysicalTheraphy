<?php
define("HOST",'5.161.211.225'); // DataBase Ipv4
define("BD",'root'); // Table name
define("USER_BD",'vicidialnow'); // Database Username
define("PASS_BD",'spt');



function connection(){
    $con = new PDO(HOST,USER_BD,PASS_BD,BD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(PDOException ) {
        die("Fail connection: " . PDOException);
    }else{
        return $con;
    }
}
