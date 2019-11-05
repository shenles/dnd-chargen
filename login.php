<?php

session_start();

echo "<html>\n<div class=\"homepage-info\">\n<form class=\"filterform\" action=\"login.php\" method=\"post\">";
echo "<input type=\"text\" name=\"username\" placeholder=\"Enter your username\" required>";
echo "<input type=\"password\" name=\"password\" placeholder=\"Enter your password\" required>";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</form></div></html>";

if (!empty($_POST)) {

    if (isset($_POST['username']) && isset($_POST['password'])) {

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

        $usrnm = $_POST['username'];
        $pass = $_POST['password'];

        $sql = "SELECT id,username,password FROM users WHERE INSTR(username, '{$usrnm}') > 0";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($row != NULL && $pass == $row["password"]) {
            $_SESSION['user_id'] = $user->id;
            echo "Login successful";
            echo "<html><div class=\"homepage-info\"><a href=\"https://dnd-chargen.herokuapp.com/addchar.php\" class=\"btn btn-default\">Create character</a>";
            echo "<a href=\"https://dnd-chargen.herokuapp.com/viewchars.php\" class=\"btn btn-default\">View saved characters</a></div></html>";

        } else {
            echo "Login failed";
        } 
    }

}

?>
