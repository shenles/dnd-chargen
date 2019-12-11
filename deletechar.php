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

    echo "<html><head></head><body>";

	$currentuser = $_SESSION['user_id'];

	if ($deletecharid != NULL) {

        $sql = "DELETE FROM characters WHERE char_id = {$deletecharid} AND user_id = {$currentuser}"; 
        $result = $conn->query($sql);
        echo "<p>Character deleted</p>";

        echo <<<EOT
        <meta http-equiv="refresh" content="3; URL=https://dnd-chargen.herokuapp.com/viewchars.php">
        <meta name="keywords" content="automatic redirection">
        <p>Automatically returning to Characters page...</p>
        EOT;

        echo "</body></html>";
	}

} else {
	header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>