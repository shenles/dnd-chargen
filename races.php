<!DOCTYPE html>
<html lang="en">
   <head>
   <title>D&D Database</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
   <link rel="stylesheet" type="text/css" href="./style.css"> 
   </head>
    
   <body>
   
   <h1>D&D 5e Races</h1>
 
   <!-- bootstrap navbar --> 
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item">
         <a class="nav-link" href="addchar.php">Create New Character</a></li>
        <li class="nav-item">
         <a class="nav-link" href="viewchars.php">View Saved Characters</a></li>
        <li class="nav-item">
         <a class="nav-link" href="classes.php">Classes</a></li>
        <li class="nav-item active">
         <a class="nav-link" href="races.php">Races</a></li>
        <li class="nav-item">
         <a class="nav-link" href="backgrounds.php">Backgrounds</a></li>
        <li class="nav-item">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

   <div class="entitytable">
     <table>
       <tr>
            <th>Race</th>
            <th>Size</th>
            <th>Speed</th>
            <th>Darkvision</th>
            <th>Languages</th>
            <th>Base race</th>
            <th>Subraces</th>
            <th>Ability score increases</th>
            <th>Proficiencies</th>
            <th>Other racial traits</th>
       </tr>

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

        $sql = "SELECT name,size,speed,darkvision,languages,baserace,subraces,abilities,profs,traits FROM races";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td>" . $row["name"] . "</td>\n<td>" . $row["size"] . "</td>\n<td>" . $row["speed"] . "</td>\n<td>" . $row["darkvision"] . "</td>\n<td>" . $row["languages"] . "</td>\n<td>" . $row["baserace"] . "</td>\n<td>" . $row["subraces"] . "</td>\n<td>" . $row["abilities"] . "</td>\n<td>" . $row["profs"] . "</td>\n<td>" . $row["traits"] . "</td>\n</tr>\n";
        }

     ?>

     </table>
   </div>

   </body>
</html>
