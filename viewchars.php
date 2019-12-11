<?php

session_start();

if (isset($_SESSION['user_id'])) {

    echo <<<EOT
    <html>
    <head>
    <title>D&D Database</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    </head>

    <body>
    <h1>Viewing saved characters</h1>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item">
         <a class="nav-link" href="addchar.php">Create New Character</a></li>
        <li class="nav-item active">
         <a class="nav-link" href="viewchars.php">View Saved Characters</a></li>
        <li class="nav-item">
         <a class="nav-link" href="classes.php">Classes</a></li>
        <li class="nav-item">
         <a class="nav-link" href="races.php">Races</a></li>
        <li class="nav-item">
         <a class="nav-link" href="backgrounds.php">Backgrounds</a></li>
        <li class="nav-item">
         <a class="nav-link" href="features.php">Features & Traits</a></li>
        <li class="nav-item">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
     </div>   
    </nav>

    <br />

    <div class="entitytable">
     <table>
       <tr>
            <th>Name</th>
            <th>Class</th>
            <th>Race</th>
            <th>Background</th>
            <th>Alignment</th>
            <th>Level</th>
            <th>Hit point max</th>
            <th>Armor class</th>
            <th>Hit dice</th>
            <th>Initiative</th>
            <th>Proficiency bonus</th>
       </tr>
       <br />
    EOT;

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

       $currentuser = $_SESSION['user_id'];

       $sql = "SELECT char_id,charname,class,race,background,alignment,level,hp,ac,hitdice,initiative,profbonus FROM characters WHERE user_id = {$currentuser} AND display = 1"; 

       $result = $conn->query($sql);

       while ($row = $result->fetch_assoc()) {

               $deleteid = "delete" . $row["char_id"];
               $editid = "edit" . $row["char_id"];
               $viewid = "view" . $row["char_id"];
               $levelupid = "levelup" . $row["char_id"];

               echo "\n<tr>\n<td>" . $row["charname"] . "</td>\n<td>" . $row["class"] . "</td>\n<td>" . $row["race"] . "</td>\n<td>" . $row["background"] . "</td>\n<td>" . $row["alignment"] . "</td>\n<td>" . $row["level"] . "</td>\n<td>" . $row["hp"] . "</td>\n<td>" . $row["ac"] . "</td>\n<td>" . $row["hitdice"] . "</td>\n<td>" . $row["initiative"] . "</td>\n<td>" . $row["profbonus"] . "</td>\n<td><a href=\"editchar.php\" class=\"btn btn-outline-secondary\" role=\"button\" id=\"" . $editid . "\">Edit</a></td>\n<td><button class=\"btn btn-outline-secondary\" onclick=\"deleteChar(" . $row["char_id"] . ")\" id=\"" . $deleteid . "\">Delete</button></td>\n<td><a href=\"viewcharinfo.php\" class=\"btn btn-outline-secondary\" role=\"button\" id=\"" . $viewid . "\">View details</a></td>\n<td><a href=\"levelup.php\" class=\"btn btn-outline-secondary\" role=\"button\" id=\"" . $levelupid . "\">Level up</a></td>\n</tr>\n";
       }

       echo <<<EOT
       </table>
       <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       <script src="viewchars.js"></script>
       </body>
       </html>
       EOT;

} else {

    header("Location: https://dnd-chargen.herokuapp.com/login.php");

} 

?>
