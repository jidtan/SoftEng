<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "adVenture";

try{
 $db = new PDO("mysql:host=$host;dbname=$database",$user,$password);
}
catch(PDOException $e)
{
echo "Database problem encountered: ".$e->getMessage();
}
?>