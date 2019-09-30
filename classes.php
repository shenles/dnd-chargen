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
   
   <h1>D&D 5e Classes</h1>
 
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
        <li class="nav-item active">
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
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

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

      $sql = "SELECT * FROM classes";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
          echo $row;
      }

   ?>

   <div class="entitytable">
   <h2>View existing classes</h2>
      <table>
         <tr>
            <th>Class name</th>
            <th>Hit dice</th>
            <th>HP at lvl 1</th>
            <th>HP gain per lvl</th>
            <th>Armor proficiencies</th>
            <th>Weapon proficiencies</th>
            <th>Tool proficiencies</th>
            <th>Save proficiencies</th>
            <th>Skill proficiencies</th>
            <th>Starting equipment</th>
            <th>Specialization</th> 
         </tr>

      <?php

      $stmt = $mysql->prepare("SELECT name,hitdice,hplvlone,hpgain,armorprofs,weaponprofs,toolprofs,saveprofs,skillprofs,startequip,specialize FROM classes");

      if (!$stmt) {  echo "Prepare failed"; }

      if (!$stmt->execute()) {  echo "Execute failed"; }

      if (!$stmt->bind_result($name,$hitdice,$hplvlone,$hpgain,$armorprofs,$weaponprofs,$toolprofs,$saveprofs,$skillprofs,$startequip,$specialize)) { echo "Bind failed"; }

      while ($stmt->fetch()) {

         //echo "<tr>\n<td>" . $name . "</td>\n<td>" . $hitdice . "</td>\n<td>" . $hplvlone . "</td>\n<td>" . $hpgain . "</td>\n<td>" . $armorprofs . "</td>\n<td>" . $weaponprofs . "</td>\n<td>" . $toolprofs . "</td>\n<td>" . $saveprofs . "</td>\n<td>" . $skillprofs . "</td>\n<td>" . $startequip . "</td>\n<td>" . $specialize . "</td>\n</tr>\n";
      } 

      $stmt->close();

      ?>

      </table>
   </div>

   </body>
</html>
