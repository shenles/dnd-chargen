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
    <h1>Creating a new character</h1>

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
    <div id="createcharform">
    <form class="filterform" action="addchar.php" method="post">
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
    <button type="submit" class="btn btn-outline-secondary">Submit</button>
    </form>
    </div>
    EOT;

    $chosenclass = $_POST['charclass'];
    $chosenrace = $_POST['charrace'];
    $chosenbg = $_POST['charbg']; 
    $alignment = $_POST['charalign'];
    $charactername = $_POST['charname'];

    if (isset($chosenclass) && isset($chosenrace)) {

       echo "<div class=\"homepage-info\" id=\"pageheader1\">Now creating character of class " . $chosenclass . ", race " . $chosenrace . ", background " . $chosenbg . ", alignment " . $alignment . "</div>";
       echo "<span id=\"charraceinfo\" style=\"display:none;\">" . $chosenrace . "</span>";
       echo "<span id=\"charclassinfo\" style=\"display:none;\">" . $chosenclass . "</span>";
       echo "<span id=\"charbginfo\" style=\"display:none;\">" . $chosenbg . "</span>";
       echo "<span id=\"charaligninfo\" style=\"display:none;\">" . $alignment . "</span>";
       echo "<span id=\"charnameinfo\" style=\"display:none;\">" . $charactername . "</span>";

       echo <<<EOT
       <div class="homepage-info" id="initialRolls">
       <p>First, roll your ability scores, or use the default rolls:</p>
       <button type="button" class="btn btn-outline-secondary" onclick="showRoll(1)">Re-roll</button>
       <button type="button" class="btn btn-outline-secondary" onclick="showRoll(2)">Use defaults</button>
       <a href="https://dnd-chargen.herokuapp.com/addmanual.php" class="btn btn-outline-secondary" id="skiprolling" role="button">Skip this step & manually enter stats</a>
       <p class="p-unique">Your current rolls:</p>
       <div class="rollresults" id="abilityrolls">
          <p><span class="oneroll" id="roll0">15</span>
             <span class="oneroll" id="roll1">14</span>
             <span class="oneroll" id="roll2">13</span>
             <span class="oneroll" id="roll3">12</span>
             <span class="oneroll" id="roll4">10</span>
             <span class="oneroll" id="roll5">8</span></p>
       </div>

       <button type="button" class="btn btn-outline-secondary" onclick="showScores()">Done rolling</button>
       </div>
       
       <div class="homepage-info" id="assignAbilityScores" style="display:none;">
       <p>Great! Now assign each number you rolled to an ability. This will be your score for that ability.</p> 
       <p>Your race may give you increases to some of these scores. We will do that next.</p>  

       <p class="p-unique">Your current ability scores:</p>
       <div class="rollresults" id="currabilityscores">
          <table>
             <tr>
             <td class="showcurrscore" id="score0"></td>
             <td class="showcurrscore" id="score1"></td>
             <td class="showcurrscore" id="score2"></td>
             <td class="showcurrscore" id="score3"></td>
             <td class="showcurrscore" id="score4"></td>
             <td class="showcurrscore" id="score5"></td></tr>
             <tr>
              <td>
               <label>Assign this roll to:
               <select class="assignr" name="num0">
               <option value="Strength">Strength</option>
               <option value="Dexterity">Dexterity</option>
               <option value="Constitution">Constitution</option>
               <option value="Intelligence">Intelligence</option>
               <option value="Wisdom">Wisdom</option>
               <option value="Charisma">Charisma</option>
               </select></label>
              </td>
              <td>
               <label>Assign this roll to:
               <select class="assignr" name="num1">
               <option value="Strength">Strength</option>
               <option value="Dexterity">Dexterity</option>
               <option value="Constitution">Constitution</option>
               <option value="Intelligence">Intelligence</option>
               <option value="Wisdom">Wisdom</option>
               <option value="Charisma">Charisma</option>
               </select></label>
              </td>
              <td>
               <label>Assign this roll to:
               <select class="assignr" name="num2">
               <option value="Strength">Strength</option>
               <option value="Dexterity">Dexterity</option>
               <option value="Constitution">Constitution</option>
               <option value="Intelligence">Intelligence</option>
               <option value="Wisdom">Wisdom</option>
               <option value="Charisma">Charisma</option>
               </select></label>
              </td>
              <td>
               <label>Assign this roll to:
               <select class="assignr" name="num3">
               <option value="Strength">Strength</option>
               <option value="Dexterity">Dexterity</option>
               <option value="Constitution">Constitution</option>
               <option value="Intelligence">Intelligence</option>
               <option value="Wisdom">Wisdom</option>
               <option value="Charisma">Charisma</option>
               </select></label>
              </td>
              <td>
               <label>Assign this roll to:
               <select class="assignr" name="num4">
               <option value="Strength">Strength</option>
               <option value="Dexterity">Dexterity</option>
               <option value="Constitution">Constitution</option>
               <option value="Intelligence">Intelligence</option>
               <option value="Wisdom">Wisdom</option>
               <option value="Charisma">Charisma</option>
               </select></label>
              </td>
              <td>
               <label>Assign this roll to:
               <select class="assignr" name="num5">
               <option value="Strength">Strength</option>
               <option value="Dexterity">Dexterity</option>
               <option value="Constitution">Constitution</option>
               <option value="Intelligence">Intelligence</option>
               <option value="Wisdom">Wisdom</option>
               <option value="Charisma">Charisma</option>
               </select></label>
              </td>
             </tr>
             <tr>
                <td id="res0"></td>
                <td id="res1"></td>
                <td id="res2"></td>
                <td id="res3"></td>
                <td id="res4"></td>
                <td id="res5"></td>
             </tr>
          </table>
       </div>
       <button type="button" class="btn btn-outline-secondary" onclick="checkAbilityScores()">Done assigning scores</button>
       </div>

       <div class="homepage-info" id="raceAbilityScores" style="display:none;">
       <p>Nice work! Now you get ability score increases based on your race:</p> 
       EOT;

       echo <<<EOT
       <p class="p-unique">Your new ability scores:</p>
       <div class="rollresults" id="newscoresrace">
          <table>
             <tr>
               <th>Strength</th>
               <th>Dexterity</th>
               <th>Constitution</th>
               <th>Intelligence</th>
               <th>Wisdom</th>
               <th>Charisma</th></tr>
             <tr>
             <td class="showcurrscore" id="scoreRace0"></td>
             <td class="showcurrscore" id="scoreRace1"></td>
             <td class="showcurrscore" id="scoreRace2"></td>
             <td class="showcurrscore" id="scoreRace3"></td>
             <td class="showcurrscore" id="scoreRace4"></td>
             <td class="showcurrscore" id="scoreRace5"></td></tr>
          </table>
          <button type="button" class="btn btn-outline-secondary" id="continue1" onclick="beginRaceIncreases()">Continue</button>
       </div>

       </div>

       <div class="homepage-info" id="halfElfScore" style="display:none;">
       <p>Because you are a Half-Elf, you can choose two other ability scores to increase by 1 each.</p> 
       <p class="p-indent">Scores available to increase:</p>
       <table id="raceTableAssign">
        <tr>
          <td class="showcurrscore" id="halfElf0"></td>
          <td class="showcurrscore" id="halfElf1"></td>
          <td class="showcurrscore" id="halfElf2"></td>
          <td class="showcurrscore" id="halfElf3"></td>
          <td class="showcurrscore" id="halfElf4"></td>
        </tr>
        <tr>
          <td>
           <label>Increase Str:
           <input type="checkbox" name="choiceincr" id="incr0"></input>
           </label>
          </td>
          <td>
           <label>Increase Dex:
           <input type="checkbox" name="choiceincr" id="incr1"></input>
           </label>
          </td>
          <td>
           <label>Increase Con:
           <input type="checkbox" name="choiceincr" id="incr2"></input>
           </label>
          </td>
          <td>
           <label>Increase Int:
           <input type="checkbox" name="choiceincr" id="incr3"></input>
           </label>
          </td>
          <td>
           <label>Increase Wis:
           <input type="checkbox" name="choiceincr" id="incr4"></input>
           </label>
          </td>
        </tr>
       </table>
       <button type="button" class="btn btn-outline-secondary" id="nextstep1" onclick="checkRaceIncreases()">Done choosing increases</button> 
       </div>

       <div class="homepage-info" id="finishStats" style="display:none;">
       <p>Excellent! Here are your finalized stats:</p>

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
             <td class="showfinalscore" id="scoreFinish0"></td>
             <td class="showfinalscore" id="scoreFinish1"></td>
             <td class="showfinalscore" id="scoreFinish2"></td>
             <td class="showfinalscore" id="scoreFinish3"></td>
             <td class="showfinalscore" id="scoreFinish4"></td>
             <td class="showfinalscore" id="scoreFinish5"></td></tr>
          </table>

       <p class="p-indent">Ability score modifiers</p>
          <table><caption>These go in the boxes in the leftmost column of your character sheet.</caption>
             <tr>
               <th>Strength</th>
               <th>Dexterity</th>
               <th>Constitution</th>
               <th>Intelligence</th>
               <th>Wisdom</th>
               <th>Charisma</th></tr>
             <tr>
             <td class="showfinalscore" id="modifier0"></td>
             <td class="showfinalscore" id="modifier1"></td>
             <td class="showfinalscore" id="modifier2"></td>
             <td class="showfinalscore" id="modifier3"></td>
             <td class="showfinalscore" id="modifier4"></td>
             <td class="showfinalscore" id="modifier5"></td></tr>
          </table>

       <p class="p-indent">Other stats and features</p>
          <table>
             <tr>
               <th>Proficiency Bonus</th>
               <th>Initiative</th>
               <th>Speed</th>
               <th>Hit Dice</th>
               <th>Hit Point Maximum</th>
               <th>Spell Attack Modifier</th>
               <th>Spell Save DC</th>
               <th>Languages Known</th>
             <tr>
             <td class="showfinalscore" id="profbonus"></td>
             <td class="showfinalscore" id="initiative"></td>
             <td class="showfinalscore" id="speed"></td>
             <td class="showfinalscore" id="hitdice"></td>
             <td class="showfinalscore" id="hpmax"></td>
             <td class="showfinalscore" id="spatkmod"></td>
             <td class="showfinalscore" id="spsavedc"></td>
             <td class="showfinalscore" id="langs"></td>
          </table>
          <p></p>
          <button type="button" class="btn btn-outline-secondary" id="continue2" onclick="doneWithStats()">I'm ready for the next step</button>
       </div>

       <div class="homepage-info" id="afterStats" style="display:none;">
       <p>Great! Now let's look at other features & proficiences of your race, class, and background:</p>
       <p>You have the following proficiencies from your race:</p>
       <ul>
       EOT;

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

       $sql = "SELECT profs FROM races WHERE INSTR(name, '{$chosenrace}') > 0 AND INSTR('{$chosenrace}', name) > 0";
       $result = $conn->query($sql);

       while ($row = $result->fetch_assoc()) {
          echo "<li>" . $row["profs"] . "</li>";
       }

       echo "</ul>";

       if ($chosenbg != "None") {
          echo "<p>You have the following proficiencies from your background:</p>\n<ul>";
          $bgsql = "SELECT skillprofs,toolprofs,langs FROM backgrounds WHERE INSTR(name, '{$chosenbg}') > 0";
          $bgresult = $conn->query($bgsql);

          while ($bgrow = $bgresult->fetch_assoc()) {
             echo "<li>" . $bgrow["skillprofs"] . "</li>";
             echo "<li>" . $bgrow["toolprofs"] . "</li>";
             echo "<li>" . $bgrow["langs"] . " additional languages</li>";
          }
       
          echo "</ul>";
       }

       echo "<p>You have the following proficiencies from your class:</p>\n";
       $clsql = "SELECT armorprofs,weaponprofs,toolprofs,saveprofs,skillprofs FROM classes WHERE INSTR(name, '{$chosenclass}') > 0";
       $clresult = $conn->query($clsql);

       while ($clrow = $clresult->fetch_assoc()) {

          if ($clrow["armorprofs"]) {
             echo "<p class=\"p-indent2\">Armor proficiencies</p>";
             echo "<ul><li>" . $clrow["armorprofs"] . "</li></ul>";
          }

          echo "<p class=\"p-indent2\">Weapon proficiencies</p>";
          echo "<ul><li>" . $clrow["weaponprofs"] . "</li></ul>";

          if ($clrow["toolprofs"]) {
             echo "<p class=\"p-indent2\">Tool proficiencies</p>";
             echo "<ul><li>" . $clrow["toolprofs"] . "</li></ul>";
          }

          echo "<p class=\"p-indent2\">Saving throws</p>";
          echo "<ul><li>" . $clrow["saveprofs"] . "</li></ul>";

          $clprofs = $clrow["skillprofs"];
       }

       echo "<p class=\"p-indent2\">Skill proficiencies</p>\n<table class=\"table-indent1\">";
       echo "<tr><td>" . $clprofs . "</td></tr>";
       echo "</table><p></p>";

       echo <<<EOT
       <button type="button" class="btn btn-outline-secondary" id="donechar1" onclick="doneCreatingChar()">Finish creating character</button>
       </div>
       <div class="homepage-info" id="viewCreated" style="display:none;">
       <p>Your character has been created!</p>
       <a href="https://dnd-chargen.herokuapp.com/viewchars.php" class="btn btn-outline-secondary" role="button">See my characters</a>
       <p></p>
       <a href="https://dnd-chargen.herokuapp.com/addchar.php" class="btn btn-outline-secondary" role="button">Create another character</a>
       </div>
       EOT;

    }

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
