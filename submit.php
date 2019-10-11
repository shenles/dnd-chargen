<?php

        $school = $_POST["school"]; 

        if ($school != NULL) {
            $sql = "SELECT name,level,school,casting,spellrange,components,material,duration,ritual FROM spells WHERE school=?";
        }

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td>" . $row["name"] . "</td>\n<td>" . $row["level"] . "</td>\n<td>" . $row["school"] . "</td>\n<td>" . $row["casting"] . "</td>\n<td>" . $row["spellrange"] . "</td>\n<td>" . $row["components"] . "</td>\n<td>" . $row["material"] . "</td>\n<td>" . $row["duration"] . "</td>\n<td>" . $row["ritual"] . "</td>\n</tr>\n";
        }

?>
