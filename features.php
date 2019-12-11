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
   
   <h1>D&D 5e Features & Traits</h1>
 
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
        <li class="nav-item active">
         <a class="nav-link" href="features.php">Features & Traits</a></li>
        <li class="nav-item">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

   <div class="pages-info">
     <h4>Filter results</h4>
     <p></p>
     By associated race:
     <form class="filterform" id="featuresbyrace" method="post" action="features.php">
        <input type="checkbox" id="dragonborn" name="race[]" value="Dragonborn">
        <label for="dragonborn">Dragonborn</label>

        <input type="checkbox" id="dwarf" name="race[]" value="Dwarf">
        <label for="dwarf">Dwarf</label>

        <input type="checkbox" id="hilldwarf" name="race[]" value="Hill Dwarf">
        <label for="hilldwarf">Hill Dwarf</label>

        <input type="checkbox" id="mountaindwarf" name="race[]" value="Mountain Dwarf">
        <label for="mountaindwarf">Mountain Dwarf</label>

        <input type="checkbox" id="elf" name="race[]" value="Elf">
        <label for="elf">Elf</label>

        <input type="checkbox" id="drow" name="race[]" value="Drow">
        <label for="drow">Drow</label>

        <input type="checkbox" id="highelf" name="race[]" value="High Elf">
        <label for="highelf">High Elf</label>

        <input type="checkbox" id="woodelf" name="race[]" value="Wood Elf">
        <label for="woodelf">Wood Elf</label>

        <input type="checkbox" id="halfelf" name="race[]" value="Half-Elf">
        <label for="halfelf">Half-Elf</label>

        <input type="checkbox" id="halforc" name="race[]" value="Half-Orc">
        <label for="halforc">Half-Orc</label>

        <input type="checkbox" id="halfling" name="race[]" value="Halfling">
        <label for="halfling">Halfling</label>

        <input type="checkbox" id="lightfoot" name="race[]" value="Lightfoot">
        <label for="lightfoot">Lightfoot</label>

        <input type="checkbox" id="stout" name="race[]" value="Stout">
        <label for="stout">Stout</label>

        <input type="checkbox" id="human" name="race[]" value="Human">
        <label for="human">Human</label>

        <input type="checkbox" id="tiefling" name="race[]" value="Tiefling">
        <label for="tiefling">Tiefling</label>

        <input type="checkbox" id="gnome" name="race[]" value="Gnome">
        <label for="gnome">Gnome</label>

        <input type="checkbox" id="forestgnome" name="race[]" value="Forest Gnome">
        <label for="forestgnome">Forest Gnome</label>

        <input type="checkbox" id="deepgnome" name="race[]" value="Deep Gnome">
        <label for="deepgnome">Deep Gnome</label>

          <input type="checkbox" id="rockgnome" name="race[]" value="Rock Gnome">
        <label for="rockgnome">Rock Gnome</label>

     <button type="submit" class="btn btn-outline-secondary" id="filterrace">Filter by race</button>
     </form>
     <p></p>

     By associated class:
     <form class="filterform" id="featuresbyclass" method="post" action="features.php">
        <input type="checkbox" id="barbarian" name="featureclass[]" value="Barbarian">
        <label for="barbarian">Barbarian</label>

        <input type="checkbox" id="bard" name="featureclass[]" value="Bard">
        <label for="bard">Bard</label>

        <input type="checkbox" id="cleric" name="featureclass[]" value="Cleric">
        <label for="cleric">Cleric</label>

        <input type="checkbox" id="druid" name="featureclass[]" value="Druid">
        <label for="druid">Druid</label>

        <input type="checkbox" id="paladin" name="featureclass[]" value="Paladin">
        <label for="paladin">Paladin</label>

        <input type="checkbox" id="ranger" name="featureclass[]" value="Ranger">
        <label for="ranger">Ranger</label>

        <input type="checkbox" id="sorcerer" name="featureclass[]" value="Sorcerer">
        <label for="sorcerer">Sorcerer</label>

        <input type="checkbox" id="warlock" name="featureclass[]" value="Warlock">
        <label for="warlock">Warlock</label>

        <input type="checkbox" id="wizard" name="featureclass[]" value="Wizard">
        <label for="wizard">Wizard</label>

        <input type="checkbox" id="rogue" name="featureclass[]" value="Rogue">
        <label for="rogue">Rogue</label>

        <input type="checkbox" id="fighter" name="featureclass[]" value="Fighter">
        <label for="fighter">Fighter</label>

        <input type="checkbox" id="monk" name="featureclass[]" value="Monk">
        <label for="monk">Monk</label>

     <button type="submit" class="btn btn-outline-secondary" id="filterclass">Filter by class</button>
     </form>
     <p></p>

   <div class="entitytable">
     <table>
       <tr>
            <th>Name</th>
            <th>Associated class</th>
            <th>Associated race</th>
            <th>Description</th>
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

        $featrace = $_POST['race'];
        $featclass = $_POST['featureclass'];

        if (!isset($featrace) && !isset($featclass)) {
            $sql = "SELECT name,classassoc,raceassoc,descrip FROM features";
        } elseif (isset($featrace)) {
            $getraces = join("','", $featrace);
            $sql = "SELECT name,classassoc,raceassoc,descrip FROM features WHERE raceassoc IN ('$getraces')";
        } elseif (isset($featclass)) {
            $getclasses = join("','", $featclass);
            $sql = "SELECT name,classassoc,raceassoc,descrip FROM features WHERE classassoc IN ('$getclasses')";
        }

        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>\n<td>" . $row["name"] . "</td>\n<td>" . $row["classassoc"] . "</td>\n<td>" . $row["raceassoc"] . "</td>\n<td>" . $row["descrip"] . "</td>\n</tr>\n";
        }

     ?>

     </table>
   </div>

   </body>
</html>
