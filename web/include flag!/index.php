<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>wecome to hebtu_ctf!</title>
</head>
<body>
	
</body>
</html>
<?php
if($_GET&&$_GET['page'])
	include $_GET['page'];
else{
	echo '<h1>wecome to hebtu_ctf!</h1><br> i think you will get the <a href="?page=1.php">flag</a>!';
}