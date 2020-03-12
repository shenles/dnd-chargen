<?php

session_start();

if (isset($_SESSION['user_id'])) {

    echo <<<EOT
    <html>
    <head>
    <title>RPG Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    <body>
    <h1>Viewing character detail</h1>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
         <a class="nav-link" href="index.html">Home</a></li>
        <li class="nav-item">
         <a class="nav-link" href="addchar.php">Create New Character</a></li>
        <li class="nav-item active">
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
    <span id="chardetaildisplayid" style="display:none;"></span>
    EOT;

    $url = getenv('JAWSDB_MARIA_URL');
    $dbparts = parse_url($url);
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $conn = new mysqli($hostname, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $currentuser = $_SESSION['user_id'];
    $displayid = NULL;

    $domdoc = new DOMDocument();
    $domdoc->loadHTMLFile("chardetail.php");
    $displayid = $domdoc->getElementById("chardetaildisplayid")->nodeValue;

    if ($displayid != NULL) {
        $sql = "SELECT charname,class,race,level,alignment,strength,dex,con,intell,wis,cha,ac,hp,hitdice,profbonus,initiative,speed,darkvision,saveprofs,skillprofs,toolprofs,weaponprofs,armorprofs,background,langs,spellclass,spellabil,spellsavedc,spellatkbonus FROM characters WHERE char_id = {$displayid} AND user_id = {$currentuser}";
    }

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $chname = $row["charname"];
        $chclass = $row["class"];
        $chrace = $row["race"];
        $chlvl = $row["level"];
        $chalign = $row["alignment"];
        $chstr = $row["strength"];
        $chdex = $row["dex"];
        $chcon = $row["con"];
        $chint = $row["intell"];
        $chwis = $row["wis"];
        $chcha = $row["cha"];
        $chac = $row["ac"];
        $chhp = $row["hp"];
        $chdice = $row["hitdice"];
        $chprof = $row["profbonus"];
        $chinit = $row["initiative"];
        $chspeed = $row["speed"];
        $chdark = $row["darkvision"];
        $chsaves = $row["saveprofs"];
        $chskills = $row["skillprofs"];
        $chtools = $row["toolprofs"];
        $chweapons = $row["weaponprofs"];
        $charmor = $row["armorprofs"];
        $chbg = $row["background"];
        $chlangs = $row["langs"];
        $chspclass = $row["spellclass"];
        $chspabil = $row["spellabil"];
        $chspdc = $row["spellsavedc"];
        $chspmod = $row["spellatkbonus"];
    }

    echo <<<EOT
    <div class="homepage-info">
       <p class="p-indent">Ability scores</p>
          <table><caption>These go in the small ovals in the leftmost column of your character sheet.</caption>
             <tr>
               <th>Strength</th>
               <th>Dexterity</th>
               <th>Constitution</th>
               <th>Intelligence</th>
               <th>Wisdom</th>
               <th>Charisma</th></tr>
             <tr>
             EOT;

             echo "<td class=\"showfinalscore\" id=\"score0\">" . $chstr . "</td>";
             echo "<td class=\"showfinalscore\" id=\"score1\">" . $chdex . "</td>";
             echo "<td class=\"showfinalscore\" id=\"score2\">" . $chcon . "</td>";
             echo "<td class=\"showfinalscore\" id=\"score3\">" . $chint . "</td>";
             echo "<td class=\"showfinalscore\" id=\"score4\">" . $chwis . "</td>";
             echo "<td class=\"showfinalscore\" id=\"score5\">" . $chcha . "</td></tr></table>";
       
       echo <<<EOT
       <p class="p-indent">Other stats and features</p>
          <table>
             <tr>
               <th>Proficiency Bonus</th>
               <th>Initiative</th>
               <th>Speed</th>
               <th>Hit Dice</th>
               <th>Hit Point Maximum</th>
               <th>Armor Class (AC)</th>
               <th>Spell Attack Modifier</th>
               <th>Spell Save DC</th>
               <th>Saving throw proficiencies</th>
             <tr>
             EOT;

             echo "<td class=\"showfinalscore\" id=\"profbonus\">" . $chprof . "</td>";
             echo "<td class=\"showfinalscore\" id=\"initiative\">" . $chinit . "</td>";
             echo "<td class=\"showfinalscore\" id=\"speed\">" . $chspeed . "</td>";
             echo "<td class=\"showfinalscore\" id=\"hitdice\">" . $chdice . "</td>";
             echo "<td class=\"showfinalscore\" id=\"hpmax\">" . $chhp . "</td>";
             echo "<td class=\"showfinalscore\" id=\"ac\">" . $chac . "</td>";
             echo "<td class=\"showfinalscore\" id=\"spatkmod\">" . $chspmod . "</td>";
             echo "<td class=\"showfinalscore\" id=\"spsavedc\">" . $chspdc . "</td>";
             echo "<td class=\"showfinalscore\" id=\"saves\">" . $chsaves . "</td></table>";

          echo "<p class=\"p-indent2\">Languages known</p><p id=\"showlangs\">" . $chlangs . "</p>";
          echo "<p class=\"p-indent2\">Skill proficiencies</p><p id=\"showskills\">" . $chskills . "</p>";
          echo "<p class=\"p-indent2\">Armor proficiencies</p><p id=\"showarmor\">" . $charmor . "</p>";
          echo "<p class=\"p-indent2\">Weapon proficiencies</p><p id=\"showweapons\">" . $chweapons . "</p>";
          echo "<p class=\"p-indent2\">Tool proficiencies</p><p id=\"showtools\">" . $chtools . "</p></div>";

          echo <<<EOT
          <script src="viewchars.js"></script>
          </body>
          </html>
          EOT;

} else {
     header("Location: https://dnd-chargen.herokuapp.com/login.php");
}

?>