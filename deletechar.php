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

	function chooseDisplay($charid) {
		if (INSTR($charid, "delete") > 0) {
                $currentuser = $_SESSION['user_id'];

                $pos = strpos($charid, "delete");
                $startidx = $pos + 1;
                $endidx = strlen($charid);
                $rowidstr = substr($charid, $startidx, $endidx - $startidx);
                $rowidnum = intval($rowidstr);

                $sql = "DELETE FROM characters WHERE char_id = {$rowidnum}"; 
                $result = $conn->query($sql);
		}
	}

	chooseDisplay($_POST['charid']);

} else {
	header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>