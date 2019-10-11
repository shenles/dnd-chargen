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
   
   <h1>D&D 5e Spells</h1>
 
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
        <li class="nav-item">
         <a class="nav-link" href="races.php">Races</a></li>
        <li class="nav-item">
         <a class="nav-link" href="backgrounds.php">Backgrounds</a></li>
        <li class="nav-item">
         <a class="nav-link" href="weapons.php">Weapons</a></li>
        <li class="nav-item">
         <a class="nav-link" href="armor.php">Armor</a></li>
        <li class="nav-item">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item active">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

   <div class="homepage-info">
     <h4>Filter results</h4>

     <p>By school:</p>
     <form class="filterform" id="spellsbyschool" method="post" action="spells.php">
        <input type="radio" id="abjuration" name="school" value="Abjuration">
        <label for="abjuration">Abjuration</label>

        <input type="radio" id="conjuration" name="school" value="Conjuration">
        <label for="conjuration">Conjuration</label>

        <input type="radio" id="divination" name="school" value="Divination">
        <label for="divination">Divination</label>

        <input type="radio" id="enchantment" name="school" value="Enchantment">
        <label for="enchantment">Enchantment</label>

        <input type="radio" id="evocation" name="school" value="Evocation">
        <label for="evocation">Evocation</label>

        <input type="radio" id="illusion" name="school" value="Illusion">
        <label for="illusion">Illusion</label>

        <input type="radio" id="necromancy" name="school" value="Necromancy">
        <label for="necromancy">Necromancy</label>

        <input type="radio" id="transmutation" name="school" value="Transmutation">
        <label for="transmutation">Transmutation</label>

     <input type="submit" id="submitfilterschool" value="Filter by school" />
     </form>

     <p>By level:</p>
     <form class="filterform" id="spellsbylevel" method="post" action="spells.php">
        <input type="number" id="picklevelfilter" name="picklevelfilter" min="0" max="9">
     <input type="submit" id="submitfilterlevel" value="Filter by level" />
     </form>

   </div>

   <br />
   <div class="entitytable" id="spellresults">
     <table>
       <tr>
            <th>Spell</th>
            <th>Level</th>
            <th>School</th> 
            <th>Casting time</th>
            <th>Range</th>
            <th>Components</th>
            <th>Materials</th>
            <th>Duration</th>
            <th>Ritual</th>
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

        $school = $_POST['school'];
        $level = $_POST['level'];

        if ($school == NULL && $level == NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,material,duration,ritual FROM spells";

        } elseif ($school != NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,material,duration,ritual FROM spells WHERE INSTR(school, '{$school}') > 0";
 
        } elseif ($level != NULL) {

            $lvlstring = strval($level);
            $sql = "SELECT name,level,school,casting,spellrange,components,material,duration,ritual FROM spells WHERE INSTR(level, '{$lvlstring}') > 0"; 

        } 


        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td>" . $row["name"] . "</td>\n<td>" . $row["level"] . "</td>\n<td>" . $row["school"] . "</td>\n<td>" . $row["casting"] . "</td>\n<td>" . $row["spellrange"] . "</td>\n<td>" . $row["components"] . "</td>\n<td>" . $row["material"] . "</td>\n<td>" . $row["duration"] . "</td>\n<td>" . $row["ritual"] . "</td>\n</tr>\n";
        }

        mysqli_close($conn);

     ?>

     </table>
   </div>

   </body>
</html>
