<?php

session_start();

$url = getenv('JAWSDB_MARIA_URL');
$dbparts = parse_url($url);
$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$currentuser = $_SESSION['user_id'];

if ($currentuser) {

    $todelete = $_POST['delcharid'];

	if ($todelete) {

        $sql = "UPDATE characters SET display = 0 WHERE char_id = {$todelete} AND user_id = {$currentuser}"; 
        $result = $conn->query($sql);

	}

    $conn->close();

} else {
	header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>