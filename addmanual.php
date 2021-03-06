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
         <a class="nav-link" href="index.html">Home</a></li>
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
    <div id="manualcharform">
    <form class="filterform" action="addmanual.php" method="post">
    <label>Enter a name for your character:
    <input type="text" name="charname" maxlength="30">
    </label><p></p>
    <label>Select a class for your character:
    <select name="charclass" id="charclass" required>
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
    </label>
    <p></p>
    <label>Select a race for your character:
    <select name="charrace" id="charrace" required>
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
    </label>
    <p></p>
    <label>Select a background for your character:
    <select name="charbg" id="charbg" required>
        <option value="None">None</option>
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
    </label>
    <p></p>
    <label>Select an alignment for your character:
    <select name="charalign" id="charalign" required>
        <option value="None">None</option>
        <option value="Lawful Good">Lawful Good</option>
        <option value="Neutral Good">Neutral Good</option>
        <option value="Chaotic Good">Chaotic Good</option>
        <option value="Neutral">Neutral</option>
        <option value="Lawful Neutral">Lawful Neutral</option>
        <option value="Chaotic Neutral">Chaotic Neutral</option>
        <option value="Lawful Evil">Lawful Evil</option>
        <option value="Neutral Evil">Neutral Evil</option>
        <option value="Chaotic Evil">Chaotic Evil</option>
    </select>
    </label>
    <p></p>
    <label for="levelform">Enter your level:</label>
    <input id="levelform" type="number" min="1" max="20">
    
    <label for="hpform">Enter your max HP:</label>
    <input id="hpform" type="number" min="1" max="600">

    <p class="p-indent">Enter your ability scores:</p>
    <label for="strform">Strength score:</label>
    <input id="strform" type="number" min="3" max="18">
    
    <label for="dexform">Dexterity score:</label>
    <input id="dexform" type="number" min="3" max="18">
    
    <label for="conform">Constitution score:</label>
    <input id="conform" type="number" min="3" max="18">
    
    <label for="intform">Intelligence score:</label>
    <input id="intform" type="number" min="3" max="18">
    
    <label for="wisform">Wisdom score:</label>
    <input id="wisform" type="number" min="3" max="18">
    
    <label for="chaform">Charisma score:</label>
    <input id="chaform" type="number" min="3" max="18">
    <p class="p-indent">Select your skill proficiencies:</p>
      <input type="checkbox" id="acrobatics" name="skillmanualselect" value="Acrobatics">
      <label for="acrobatics">Acrobatics</label>

      <input type="checkbox" id="animalhandling" name="skillmanualselect" value="Animal Handling">
      <label for="animalhandling">Animal Handling</label>

      <input type="checkbox" id="arcana" name="skillmanualselect" value="Arcana">
      <label for="arcana">Arcana</label>

      <input type="checkbox" id="athletics" name="skillmanualselect" value="Athletics">
      <label for="athletics">Athletics</label>

      <input type="checkbox" id="deception" name="skillmanualselect" value="Deception">
      <label for="deception">Deception</label>

      <input type="checkbox" id="history" name="skillmanualselect" value="History">
      <label for="history">History</label>
      
      <input type="checkbox" id="insight" name="skillmanualselect" value="Insight">
      <label for="insight">Insight</label>
 
      <input type="checkbox" id="intimidation" name="skillmanualselect" value="Intimidation">
      <label for="intimidation">Intimidation</label>

      <input type="checkbox" id="investigation" name="skillmanualselect" value="Investigation">
      <label for="investigation">Investigation</label>
      <p></p>
      <input type="checkbox" id="medicine" name="skillmanualselect" value="Medicine">
      <label for="medicine">Medicine</label>

      <input type="checkbox" id="nature" name="skillmanualselect" value="Nature">
      <label for="nature">Nature</label>

      <input type="checkbox" id="perception" name="skillmanualselect" value="Perception">
      <label for="perception">Perception</label>
      
      <input type="checkbox" id="performance" name="skillmanualselect" value="Performance">
      <label for="performance">Performance</label>

      <input type="checkbox" id="persuasion" name="skillmanualselect" value="Persuasion">
      <label for="persuasion">Persuasion</label>

      <input type="checkbox" id="religion" name="skillmanualselect" value="Religion">
      <label for="religion">Religion</label>

      <input type="checkbox" id="sleightofhand" name="skillmanualselect" value="Sleight of Hand">
      <label for="sleightofhand">Sleight of Hand</label>

      <input type="checkbox" id="stealth" name="skillmanualselect" value="Stealth">
      <label for="stealth">Stealth</label>

      <input type="checkbox" id="survival" name="skillmanualselect" value="Survival">
      <label for="survival">Survival</label>
      <p></p>
    <button type="submit" class="btn btn-outline-secondary">Submit</button>
    </form>
    </div>
    EOT;

    $chosenclass = $_POST['charclass'];
    $chosenrace = $_POST['charrace'];
    $chosenbg = $_POST['charbg']; 
    $alignment = $_POST['charalign'];
    $strscore = $_POST['strform'];
    $dexscore = $_POST['dexform'];
    $conscore = $_POST['conform'];
    $intscore = $_POST['intform'];
    $wisscore = $_POST['wisform'];
    $chascore = $_POST['chaform'];

    echo <<<EOT
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="addchar.js"></script>
    </body>
    </html>
    EOT;

} else {
    header("Location: https://dnd-chargen.herokuapp.com/login.php");
} 

?>
