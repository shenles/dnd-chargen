<?php

session_start();

echo <<<EOT
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
<div class="homepage-info">You must sign in to access that page.</div> 

<form class="filterform" action="login.php" method="post">
<input type="text" name="username" placeholder="Enter your username" required>
<input type="password" name="password" placeholder="Enter your password" required>
<button type="submit" class="btn btn-outline-secondary">Submit</button>
</form>
EOT;

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

            $_SESSION['user_id'] = $row["id"];

            echo "<div class=\"homepage-info\"><p>Login successful</p>";
            echo "<a href=\"https://dnd-chargen.herokuapp.com/addchar.php\" class=\"btn btn-outline-secondary\" role=\"button\">Create a character</a>";
            echo "<p></p><a href=\"https://dnd-chargen.herokuapp.com/viewchars.php\" class=\"btn btn-outline-secondary\" role=\"button\">View saved characters</a>";

        } else {
            echo "<p>Login failed</p>";
        } 

        echo "</div></body></html>";
    }

}

?>
