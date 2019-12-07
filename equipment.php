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
   
   <h1>D&D 5e Equipment</h1>
 
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
        <li class="nav-item active">
         <a class="nav-link" href="equipment.php">Equipment</a></li>
        <li class="nav-item">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
    </div>   
   </nav>

   <div class="pages-info">
     <h4>Filter results</h4>
     <p></p>
     By category:
     <form class="filterform" id="equipbytype" method="post" action="equipment.php">
        <input type="radio" id="simplemelee" name="equiptype" value="simple+melee">
        <label for="simplemelee">simple melee weapons</label>

        <input type="radio" id="simpleranged" name="equiptype" value="simple+ranged">
        <label for="simpleranged">simple ranged weapons</label>

        <input type="radio" id="simpleweapon" name="equiptype" value="simple">
        <label for="simpleweapon">all simple weapons</label>
        <p></p>

        <input type="radio" id="martialmelee" name="equiptype" value="martial+melee">
        <label for="martialmelee">martial melee weapons</label>

        <input type="radio" id="martialranged" name="equiptype" value="martial+ranged">
        <label for="martialranged">martial ranged weapons</label>

        <input type="radio" id="martialweapon" name="equiptype" value="martial">
        <label for="martialweapon">all martial weapons</label>
        <p></p>

        <input type="radio" id="meleeweapon" name="equiptype" value="melee">
        <label for="meleeweapon">all melee weapons</label>

        <input type="radio" id="rangedweapon" name="equiptype" value="ranged">
        <label for="rangedweapon">all ranged weapons</label>

        <input type="radio" id="allweapons" name="equiptype" value="weapon">
        <label for="allweapons">all weapons</label>
        <p></p>

        <input type="radio" id="lightarmor" name="equiptype" value="light">
        <label for="lightarmor">light armor</label>

        <input type="radio" id="medarmor" name="equiptype" value="medium">
        <label for="medarmor">medium armor</label>

        <input type="radio" id="heavyarmor" name="equiptype" value="heavy">
        <label for="heavyarmor">heavy armor</label>

        <input type="radio" id="allarmor" name="equiptype" value="armor">
        <label for="allarmor">all armor</label>

        <input type="radio" id="otherequip" name="equiptype" value="other">
        <label for="otherequip">all other equipment</label>

     <button type="submit" class="btn btn-outline-secondary" id="submitfiltercategory">Filter by category</button>
     </form>

   </div>

   <br />
   <div class="entitytable" id="equipresults">
     <table>
       <tr>
            <th>Item</th>
            <th>Cost</th>
            <th>Weapon Category</th> 
            <th>Armor Category</th>
            <th>Damage</th>
            <th>AC</th>
            <th>Stealth</th>
            <th>Properties</th>
            <th>Notes</th>
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

        $category = $_POST['equiptype'];

        switch ($category) {

            case "light":
            case "medium":
            case "heavy":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE INSTR(armorcat, '{$category}') > 0"; 
                break;
            case "armor":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE armorcat IS NOT NULL";
                break;
            case "weapon":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE weaponcat IS NOT NULL";
                break; 
            case "other": 
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE weaponcat IS NULL and armorcat IS NULL";
                break;
            case "simple":
            case "martial":
            case "melee":
            case "ranged":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE INSTR(weaponcat, '{$category}') > 0";
                break;
            case "simple+melee":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE INSTR(weaponcat, 'simple') > 0 and INSTR(weaponcat, 'melee') > 0"; 
                break;
            case "simple+ranged":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE INSTR(weaponcat, 'simple') > 0 and INSTR(weaponcat, 'ranged') > 0";      
                break;
            case "martial+melee":
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE INSTR(weaponcat, 'martial') > 0 and INSTR(weaponcat, 'melee') > 0";      
                break;
            case "martial+ranged": 
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment WHERE INSTR(weaponcat, 'martial') > 0 and INSTR(weaponcat, 'ranged') > 0";
                break;
            default: 
                $sql = "SELECT name,cost,weaponcat,armorcat,dmg,ac,stealth,properties,propertydescrip,descrip FROM equipment"; 
        }


        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {

            echo "<tr>\n<td data-toggle=\"tooltip\" title=\"" . $row["descrip"] . "\">" . "<span style=\"border-bottom: 1px dotted;\">" . $row["name"] . "</span></td>\n<td>" . $row["cost"] . "</td>\n<td>" . $row["weaponcat"] . "</td>\n<td>" . $row["armorcat"] . "</td>\n<td>" . $row["dmg"] . "</td>\n<td>" . $row["ac"] . "</td>\n<td>" . $row["stealth"] . "</td>\n<td>" . $row["properties"] . "</td>\n<td>" . $row["propertydescrip"] . "</td>\n</tr>\n";

        }

     ?>

     </table>
   </div>

   <script>

       $(document).ready(function(){
           $('[data-toggle="tooltip"]').tooltip( {delay: 0} );
       });
   
   </script>

   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   </body>
</html>
