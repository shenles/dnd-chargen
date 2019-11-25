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
    <form class="filterform" action="addchar.php" method="post">
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
    <input type="submit" value="Submit">
    </form>
    EOT;

    $chosenclass = $_POST['charclass'];
    $chosenrace = $_POST['charrace'];
    $chosenbg = $_POST['charbg']; 
    $alignment = $_POST['charalign'];

    if (isset($chosenclass) && isset($chosenrace)) {

       echo "<div class=\"homepage-info\">Now creating character of class " . $chosenclass . ", race " . $chosenrace . ", background " . $chosenbg . ", alignment " . $alignment . "</div>";  

       echo "<span id=\"charraceinfo\" style=\"display:none;\">" . $chosenrace . "</span>";
       echo "<span id=\"charclassinfo\" style=\"display:none;\">" . $chosenclass . "</span>";
       echo "<span id=\"charbginfo\" style=\"display:none;\">" . $chosenbg . "</span>";
       echo "<span id=\"charaligninfo\" style=\"display:none;\">" . $alignment . "</span>";

       echo <<<EOT
       <div class="homepage-info" id="initialRolls">
       <p>First, roll your ability scores, or use the default rolls:</p>
       <button class="leftassign" onclick="showRoll(1)">Re-roll</button><button class="leftassign" onclick="showRoll(2)">Use defaults</button>
       <a href="https://dnd-chargen.herokuapp.com/addmanual.php" class="btn btn-secondary" id="skiprolling" role="button">Skip this step & manually enter stats</a>
       <p class="p-unique">Your current rolls:</p>
       <div class="rollresults" id="abilityrolls">
          <p><span class="oneroll" id="roll0">15</span>
             <span class="oneroll" id="roll1">14</span>
             <span class="oneroll" id="roll2">13</span>
             <span class="oneroll" id="roll3">12</span>
             <span class="oneroll" id="roll4">10</span>
             <span class="oneroll" id="roll5">8</span></p>
       </div>

       <button onclick="showScores()">Done rolling</button>
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
       <button class="scoreassign" onclick="checkAbilityScores()">Done assigning scores</button>
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
       </div>

       </div>

       <div class="homepage-info" id="halfElfScore" style="display:none;">
       <p>Because you are a Half-Elf, you also get to choose two ability scores to increase by 1 each.</p> 
       <p class="p-indent">Scores available to increase:</p>
       <table id="raceTableAssign">
        <tr>
          <td id="halfElf0">15</td><td><button class="leftassign" onclick="incrAbility(0, 1)">increase Strength</button></td>
          <td><button class="leftassign" onclick="incrAbility(0, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElf1">14</td><td><button class="leftassign" onclick="incrAbility(1, 1)">increase Dexterity</button></td>
          <td><button class="leftassign" onclick="incrAbility(1, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElf2">13</td><td><button class="leftassign" onclick="incrAbility(2, 1)">increase Constitution</button></td>
          <td><button class="leftassign" onclick="incrAbility(2, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElf3">12</td><td><button class="leftassign" onclick="incrAbility(3, 1)">increase Intelligence</button></td>
          <td><button class="leftassign" onclick="incrAbility(3, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElf4">10</td><td><button class="leftassign" onclick="incrAbility(4, 1)">increase Wisdom</button></td>
          <td><button class="leftassign" onclick="incrAbility(4, -1)">undo increase</button></td>
        </tr>
       </table>
       <button class="scoreassign" onclick="checkRaceIncreases()">Done choosing increases</button> 
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
               <th>Languages Known</th>
             <tr>
             <td class="showfinalscore" id="profbonus"></td>
             <td class="showfinalscore" id="initiative"></td>
             <td class="showfinalscore" id="speed"></td>
             <td class="showfinalscore" id="hitdice"></td>
             <td class="showfinalscore" id="hpmax"></td>
             <td class="showfinalscore" id="langs"></td>
          </table>
       <button class="scoreassign" onclick="doneWithStats()">I'm ready for the next step</button>

       </div>

       <div class="homepage-info" id="afterStats" style="display:none;">
       <p>Great! Now let's look at other features & proficiences of your race, class, and background:</p>

       EOT;

    }

    echo <<<EOT

    <script src="addchar.js"></script>

    </body>
    </html>
    EOT;

} else {

    header("Location: https://dnd-chargen.herokuapp.com/login.php");

} 

?>
