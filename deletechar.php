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

if (isset($_SESSION['user_id'])) {

    $currentuser = $_SESSION['user_id'];

	if (isset($_POST['delcharid']) {

        $todelete = $_POST['delcharid'];

        $sql = "UPDATE characters SET display = 0 WHERE char_id = {$todelete} AND user_id = {$currentuser}"; 
        $result = $conn->query($sql);

	}

} else {
	header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>