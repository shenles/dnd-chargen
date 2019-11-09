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
    <h1>Creating new character</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item active">
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
        <li class="nav-item">
         <a class="nav-link" href="spells.php">Spells</a></li>  
      </ul>
     </div>   
    </nav>
    <br />
    EOT;

    echo <<<EOT
    <form class="filterform" action="addchar.php" method="post">
    <select name="charclass" id="charclass" required>
    <label for="charclass">Select a class for your character:</label>
        <option value="Barbarian">Barbarian</option>
        <option value="Bard">Bard</option>
        <option value="Cleric">Cleric</option>
        <option value="Druid">Druid</option>       
        <option value="Fighter">Fighter</option>
        <option value="Monk">Monk</option>
        <option value="Paladin">Paladin</option>
        <option value="Ranger">Ranger</option>
        <option value="Rogue">Rogue</option>
        <option value="Sorcerer">Sorcerer</option>
        <option value="Warlock">Warlock</option>
        <option value="Wizard">Wizard</option>
    </select>
    <p></p>
    <select name="charrace" id="charrace" required>
    <label for="charrace">Select a race for your character:</label>
        <option value="Dragonborn">Dragonborn</option>
        <option value="Dwarf">Dwarf</option>
        <option value="Hill Dwarf">Hill Dwarf</option>
        <option value="Mountain Dwarf">Mountain Dwarf</option>
        <option value="Elf">Elf</option>
        <option value="High Elf">High Elf</option>
        <option value="Drow">Drow</option>
        <option value="Wood Elf">Wood Elf</option>
        <option value="Halfling">Halfling</option>
        <option value="Lightfoot Halfling">Lightfoot Halfling</option>
        <option value="Stout Halfling">Stout Halfling</option>
        <option value="Human">Human</option>
        <option value="Half-Elf">Half-Elf</option>
        <option value="Half-Orc">Half-Orc</option>
        <option value="Gnome">Gnome</option>
        <option value="Forest Gnome">Forest Gnome</option>
        <option value="Rock Gnome">Rock Gnome</option>
        <option value="Deep Gnome">Deep Gnome</option>
        <option value="Tiefling">Tiefling</option>
    </select>
    <p></p>
    <select name="charbg" id="charbg" required>
    <label for="charbg">Select a background for your character:</label>
        <option value="">None</option>
        <option value="Acolyte">Acolyte</option>
        <option value="Charlatan">Charlatan</option>
        <option value="Criminal">Criminal</option>
        <option value="Entertainer">Entertainer</option>
        <option value="Guild Artisan">Guild Artisan</option>
        <option value="Hermit">Hermit</option>
        <option value="Noble">Noble</option>
        <option value="Outlander">Outlander</option>
        <option value="Sage">Sage</option>
        <option value="Sailor">Sailor</option>
        <option value="Soldier">Soldier</option>
        <option value="Urchin">Urchin</option>
    </select>
    <p></p>
    <input type="submit" value="Submit">
    </form>
    EOT;

    $chosenclass = $_POST['charclass'];
    $chosenrace = $_POST['charrace'];
    $chosenbg = $_POST['charbg']; 

    if (isset($chosenclass) && isset($chosenrace)) {

       echo "<div class=\"homepage-info\">Now creating character of class " . $chosenclass . ", race " . $chosenrace . ", background " . $chosenbg . "</div>";  

       echo <<<EOT
       <div class="homepage-info">
       <p>First, roll your ability scores, or use the default rolls:</p>
       <button onclick="showRoll(1)">Roll</button><button onclick="showRoll(2)">Use defaults</button>

       <p>Your current rolls:</p>
       <div class="rollresults" id="abilityrolls">
          <p>15    14    13    12    10    8</p>
       </div>

       <button onclick="showScores()">Done rolling</button>
       </div>
       
       <div id="assignAbilityScores" style="display:none;">
       <table>
        <tr>
          <td>15</td><td><button class="leftassign">assign to Str</button></td><td><button>assign to Dex</button></td><td><button>assign to Con</button></td><td><button>assign to Int</button></td><td><button>assign to Wis</button></td><td><button>assign to Cha</button></td>
        </tr>
        <tr>
          <td>14</td><td><button class="leftassign">assign to Str</button></td><td><button>assign to Dex</button></td><td><button>assign to Con</button></td><td><button>assign to Int</button></td><td><button>assign to Wis</button></td><td><button>assign to Cha</button></td>
        </tr>
        <tr>
          <td>13</td><td><button class="leftassign">assign to Str</button></td><td><button>assign to Dex</button></td><td><button>assign to Con</button></td><td><button>assign to Int</button></td><td><button>assign to Wis</button></td><td><button>assign to Cha</button></td>
        </tr>
        <tr>
          <td>12</td><td><button class="leftassign">assign to Str</button></td><td><button>assign to Dex</button></td><td><button>assign to Con</button></td><td><button>assign to Int</button></td><td><button>assign to Wis</button></td><td><button>assign to Cha</button></td>
        </tr>
        <tr>
          <td>10</td><td><button class="leftassign">assign to Str</button></td><td><button>assign to Dex</button></td><td><button>assign to Con</button></td><td><button>assign to Int</button></td><td><button>assign to Wis</button></td><td><button>assign to Cha</button></td> 
        </tr>
        <tr>
          <td>8</td><td><button class="leftassign">assign to Str</button></td><td><button>assign to Dex</button></td><td><button>assign to Con</button></td><td><button>assign to Int</button></td><td><button>assign to Wis</button></td><td><button>assign to Cha</button></td>
        </tr>
       </table>
       </div>
       EOT;

    }

    echo <<<EOT

    <script>

       function showRoll(rolloption) {
          console.log(rolloption);
       }

       function showScores() {
          document.getElementById('assignAbilityScores').style.display = "block";
       }

    </script>

    EOT;

    echo "</body></html>";

} else {

    header("Location: https://dnd-chargen.herokuapp.com/login.php");

} 

?>
