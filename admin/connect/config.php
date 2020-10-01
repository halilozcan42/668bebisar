<?php 


$host = "localhost";
$username = "root";
$password = "";
$db     = "668bebisar";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


/*

$host = "localhost";
$username = "root";
$password = "";
$db 	= "668bebisar";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

 */



 ?>