<!DOCTYPE html>
<html lang="en">
   <head>
   <title>D&D Database</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="./style.css"> 
   </head>
    
   <body>

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

	if ($deletecharid) {

        $sql = "UPDATE characters SET display = 0 WHERE char_id = {$deletecharid} AND user_id = {$currentuser}"; 
        $result = $conn->query($sql);
        echo "<p>Character deleted</p>";

        echo <<<EOT
        <meta http-equiv="refresh" content="3; URL=https://dnd-chargen.herokuapp.com/viewchars.php">
        <meta name="keywords" content="automatic redirection">
        <p>Now returning to Characters page...</p>
        EOT;

	}

} else {
	header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>

</body>
</html>