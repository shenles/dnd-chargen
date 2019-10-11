<?php

        $url = getenv('JAWSDB_MARIA_URL');
        $dbparts = parse_url($url);
        $hostname = $dbparts['host'];
        $username = $dbparts['user'];
        $password = $dbparts['pass'];
        $database = ltrim($dbparts['path'],'/');

        // Create connection
        $conn = new mysqli($hostname, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
        }

        $school = $_POST["school"]; 

        if ($school != NULL) {
            $sql = "SELECT name,level,school,casting,spellrange,components,material,duration,ritual FROM spells WHERE school=?";
        }

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td>" . $row["name"] . "</td>\n<td>" . $row["level"] . "</td>\n<td>" . $row["school"] . "</td>\n<td>" . $row["casting"] . "</td>\n<td>" . $row["spellrange"] . "</td>\n<td>" . $row["components"] . "</td>\n<td>" . $row["material"] . "</td>\n<td>" . $row["duration"] . "</td>\n<td>" . $row["ritual"] . "</td>\n</tr>\n";
        }

        mysqli_close($conn);

?>
