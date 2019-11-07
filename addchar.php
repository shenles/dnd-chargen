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
    EOT;

    echo <<<EOT
    <form class="filterform" action="addchar.php" method="post">
    <select name="charclass" label="Select a class for your character:" required>
        <option value="">None</option>
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
    <select name="charrace" label="Select a race for your character:" required>
        <option value="">None</option>
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
    <select name="charbg" label="Select a background for your character:" required>
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

    echo "<div class=\"homepage-info\">Now creating character of class " . $chosenclass ", race " . $chosenrace . ", background " . $chosenbg . "</div>";  

    echo "</body></html>";

} else {

    header("Location: https://dnd-chargen.herokuapp.com/login.php");

} 

?>
