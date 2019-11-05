<?php

session_start();

echo "<html>\n<div class=\"homepage-info\">\n<form action=\"\" method=\"post\">";
echo "<input type=\"text\" name=\"username\" placeholder=\"Enter your username\" required>";
echo "<input type=\"text\" name=\"password\" placeholder=\"Enter your password\" required>";
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

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_object();

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['user_id'] = $user->ID;
            echo "Login successful";
        } else {
            echo "Login failed";
        } 
    }

}

?>
