<?php 

$host = "localhost";
$question = "root";
$answer = "";
$steps = "";
$db = "mytable";

$con=mysqli_connect($host, $question, $answer, $steps, $db);
	if ($con) {
		echo "connected seccessfully to mytable database";
	}

	$sql="insert into mytable (question,answer,steps) values ('what are the best business in this area?','information tech business','step1 blelele')";
	$query=mysqli_query($con,$sql);
	if($query)
		echo 'data inserted successfully';

// try{
//  $db = new PDO("mysql:host=$host;dbname=$database";
// }
// catch(PDOException $e)
// {
// echo "Database problem encountered: ".$e->getMessage();
// }
// ?>