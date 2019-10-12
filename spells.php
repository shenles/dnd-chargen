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
     <p></p>
     By school:
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
     <p></p>

     By level (0-9):
     <form class="filterform" id="spellsbylevel" method="post" action="spells.php">
        <input type="number" id="picklevelfilter" name="chooselevel" min="0" max="9">
     <input type="submit" id="submitfilterlevel" value="Filter by level" />
     </form>

     <p></p>
     By class:
     <form class="filterform" id="spellsbyclass" method="post" action="spells.php">
        <input type="radio" id="bard" name="chooseclass" value="Bard">
        <label for="bard">Bard</label>

        <input type="radio" id="cleric" name="chooseclass" value="Cleric">
        <label for="cleric">Cleric</label>

        <input type="radio" id="druid" name="chooseclass" value="Druid">
        <label for="druid">Druid</label>

        <input type="radio" id="paladin" name="chooseclass" value="Paladin">
        <label for="paladin">Paladin</label>

        <input type="radio" id="ranger" name="chooseclass" value="Ranger">
        <label for="ranger">Ranger</label>

        <input type="radio" id="sorcerer" name="chooseclass" value="Sorcerer">
        <label for="sorcerer">Sorcerer</label>

        <input type="radio" id="warlock" name="chooseclass" value="Warlock">
        <label for="warlock">Warlock</label>

        <input type="radio" id="wizard" name="chooseclass" value="Wizard">
        <label for="wizard">Wizard</label>

     <input type="submit" id="submitfilterclass" value="Filter by class" />
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
            <th>Classes</th>
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
        $level = $_POST['chooselevel'];
        $spellclass = $_POST['chooseclass'];

        if (($school == NULL && $level == NULL) && $spellclass == NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,cancast,duration,ritual,descrip FROM spells";

        } elseif ($school != NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,cancast,duration,ritual,descrip FROM spells WHERE INSTR(school, '{$school}') > 0";
 
        } elseif ($level != NULL) {

            $levelstring = strval($level);
            $sql = "SELECT name,level,school,casting,spellrange,components,cancast,duration,ritual,descrip FROM spells WHERE INSTR(level, '{$levelstring}') > 0"; 

        } elseif ($spellclass != NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,cancast,duration,ritual,descrip FROM spells WHERE INSTR(cancast, '{$spellclass}') > 0";

        } 

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td data-toggle=\"tooltip\" title=\"" . $row["descrip"] . "\">" . $row["name"] . "</td>\n<td>" . $row["level"] . "</td>\n<td>" . $row["school"] . "</td>\n<td>" . $row["casting"] . "</td>\n<td>" . $row["spellrange"] . "</td>\n<td>" . $row["components"] . "</td>\n<td>" . $row["cancast"] . "</td>\n<td>" . $row["duration"] . "</td>\n<td>" . $row["ritual"] . "</td>\n</tr>\n";

        }

     ?>

     </table>
   </div>

   <script>

       $(document).ready(function(){
           $('[data-toggle="tooltip"]').tooltip();
       });
   
   </script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   </body>
</html>
