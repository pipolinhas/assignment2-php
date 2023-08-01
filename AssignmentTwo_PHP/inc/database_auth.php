<?php



	try{
		$conn = new PDO('mysql:host=localhost:8080;dbname=mydb','root','');
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
	
?>
