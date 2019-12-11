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

	$charid = $_POST['charid'];
	$currentuser = $_SESSION['user_id'];

	if (INSTR($charid, "delete") > 0) {

        $pos = strpos($charid, "delete");
        $startidx = $pos + 1;
        $endidx = strlen($charid);
        $rowidstr = substr($charid, $startidx, $endidx - $startidx);
        $rowidnum = intval($rowidstr);

        $sql = "UPDATE characters SET display = 0 WHERE char_id = {$rowidnum}"; 
        $result = $conn->query($sql);
	}

} else {
	header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>