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
         <a class="nav-link" href="index.html">Home</a></li>
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
         <a class="nav-link" href="features.php">Features & Traits</a></li>
        <li class="nav-item">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item active">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

   <div class="pages-info">
     <h4>Filter results</h4>
     <p></p>
     By school:
     <form class="filterform" id="spellsbyschool" method="post" action="spells.php">
        <input type="checkbox" id="abjuration" name="school[]" value="Abjuration">
        <label for="abjuration">Abjuration</label>

        <input type="checkbox" id="conjuration" name="school[]" value="Conjuration">
        <label for="conjuration">Conjuration</label>

        <input type="checkbox" id="divination" name="school[]" value="Divination">
        <label for="divination">Divination</label>

        <input type="checkbox" id="enchantment" name="school[]" value="Enchantment">
        <label for="enchantment">Enchantment</label>

        <input type="checkbox" id="evocation" name="school[]" value="Evocation">
        <label for="evocation">Evocation</label>

        <input type="checkbox" id="illusion" name="school[]" value="Illusion">
        <label for="illusion">Illusion</label>

        <input type="checkbox" id="necromancy" name="school[]" value="Necromancy">
        <label for="necromancy">Necromancy</label>

        <input type="checkbox" id="transmutation" name="school[]" value="Transmutation">
        <label for="transmutation">Transmutation</label>

     <button type="submit" class="btn btn-outline-secondary" id="submitfilterschool">Filter by school</button>
     </form>
     <p></p>

     By class:
     <form class="filterform" id="spellsbyclass" method="post" action="spells.php">
        <input type="checkbox" id="bard" name="chooseclass[]" value="Bard">
        <label for="bard">Bard</label>

        <input type="checkbox" id="cleric" name="chooseclass[]" value="Cleric">
        <label for="cleric">Cleric</label>

        <input type="checkbox" id="druid" name="chooseclass[]" value="Druid">
        <label for="druid">Druid</label>

        <input type="checkbox" id="paladin" name="chooseclass[]" value="Paladin">
        <label for="paladin">Paladin</label>

        <input type="checkbox" id="ranger" name="chooseclass[]" value="Ranger">
        <label for="ranger">Ranger</label>

        <input type="checkbox" id="sorcerer" name="chooseclass[]" value="Sorcerer">
        <label for="sorcerer">Sorcerer</label>

        <input type="checkbox" id="warlock" name="chooseclass[]" value="Warlock">
        <label for="warlock">Warlock</label>

        <input type="checkbox" id="wizard" name="chooseclass[]" value="Wizard">
        <label for="wizard">Wizard</label>

        <input type="checkbox" id="rogue" name="chooseclass[]" value="Wizard">
        <label for="rogue">Rogue (Arcane Trickster)</label>

        <input type="checkbox" id="fighter" name="chooseclass[]" value="Wizard">
        <label for="fighter">Fighter (Eldritch Knight)</label>

     <button type="submit" class="btn btn-outline-secondary" id="submitfilterclass">Filter by class</button>
     </form>
     <p></p>

     By level (0-9):
     <form class="filterform" id="spellsbylevel" method="post" action="spells.php">
     <select name="chooselevel">
         <option value="0">0</option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         <option value="9">9</option>  
     <button type="submit" class="btn btn-outline-secondary" id="submitfilterlevel">Filter by level</button>
     </form>
     <p></p>

     By letter (A-Z):
     <form class="filterform" id="spellsbyletter" method="post" action="spells.php">
        <select name="chooseletter">
           <option value="A">A</option>
           <option value="B">B</option>
           <option value="C">C</option>
           <option value="D">D</option>
           <option value="E">E</option>
           <option value="F">F</option>
           <option value="G">G</option>
           <option value="H">H</option>
           <option value="I">I</option>
           <option value="J">J</option>
           <option value="K">K</option>
           <option value="L">L</option>
           <option value="M">M</option>
           <option value="N">N</option>
           <option value="O">O</option>
           <option value="P">P</option>
           <option value="Q">Q</option>
           <option value="R">R</option>
           <option value="S">S</option>
           <option value="T">T</option>
           <option value="U">U</option>
           <option value="V">V</option>
           <option value="W">W</option>
           <option value="X">X</option>
           <option value="Y">Y</option>
           <option value="Z">Z</option>

     <button type="submit" class="btn btn-outline-secondary" id="submitfilterletter">Filter by letter</button>
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
            <th>Duration</th>
            <th>Components</th>
            <th>Materials</th>
            <th>Classes</th>
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

        $chosenschool = $_POST['school'];
        $level = $_POST['chooselevel'];
        $spellclass = $_POST['chooseclass'];
        $firstletter = $_POST['chooseletter']; 

        if ((!isset($chosenschool) && $level == NULL) && (!isset($spellclass) && $firstletter == NULL)) {

            $sql = "SELECT name,level,school,casting,spellrange,components,material,cancast1,cancast2,cancast3,duration,ritual,descrip,schooldescrip FROM spells";

        } elseif (isset($chosenschool)) {

            $getschools = join("','", $chosenschool); 

            $sql = "SELECT name,level,school,casting,spellrange,components,material,cancast1,cancast2,cancast3,duration,ritual,descrip,schooldescrip FROM spells WHERE school IN ('$getschools')";
 
        } elseif ($level != NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,material,cancast1,cancast2,cancast3,duration,ritual,descrip,schooldescrip FROM spells WHERE INSTR(level, '{$level}') > 0"; 

        } elseif (isset($spellclass)) {

            $getspells = join("','", $spellclass);

            $sql = "SELECT name,level,school,casting,spellrange,components,material,cancast1,cancast2,cancast3,duration,ritual,descrip,schooldescrip FROM spells WHERE cancast1 IN ('$getspells') OR cancast2 IN ('$getspells') OR cancast3 IN ('$getspells')";

        } elseif ($firstletter != NULL) {

            $sql = "SELECT name,level,school,casting,spellrange,components,material,cancast1,cancast2,cancast3,duration,ritual,descrip,schooldescrip FROM spells WHERE name LIKE '{$firstletter}%'"; 

        } 

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td data-toggle=\"tooltip\" title=\"" . $row["descrip"] . "\">" . "<span style=\"border-bottom: 1px dotted;\">" . $row["name"] . "</span></td>\n<td>" . $row["level"] . "</td>\n<td data-toggle=\"tooltip\" title=\"" . $row["schooldescrip"] . "\">" . "<span style=\"border-bottom: 1px dotted;\">" . $row["school"] . "</td>\n<td>" . $row["casting"] . "</td>\n<td>" . $row["spellrange"] . "</td>\n<td>" . $row["duration"] . "</td>\n<td>" . $row["components"] . "</td>\n<td>" . $row["material"] . "</td>\n<td>" . $row["cancast1"] . " " . $row["cancast2"] . " " . $row["cancast3"] . "</td>\n<td>" . $row["ritual"] . "</td>\n</tr>\n";

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
