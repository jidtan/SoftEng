<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "adventure";

try{
 $db = new PDO("mysql:host=$host;dbname=$database",$businessname,$location);
}
catch(PDOException $e)
{
echo "Database problem encountered: ".$e->getMessage();
}
?>