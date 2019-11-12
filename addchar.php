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
       <div class="homepage-info" id="initialRolls">
       <p>First, roll your ability scores, or use the default rolls:</p>
       <button class="leftassign" onclick="showRoll(1)">Re-roll</button><button class="leftassign" onclick="showRoll(2)">Use defaults</button>

       <p class="p-unique">Your current rolls:</p>
       <div class="rollresults" id="abilityrolls">
          <p><span class="oneroll" id="rollOne">15</span>
             <span class="oneroll" id="rollTwo">14</span>
             <span class="oneroll" id="rollThree">13</span>
             <span class="oneroll" id="rollFour">12</span>
             <span class="oneroll" id="rollFive">10</span>
             <span class="oneroll" id="rollSix">8</span></p>
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
               <th>Strength</th>
               <th>Dexterity</th>
               <th>Constitution</th>
               <th>Intelligence</th>
               <th>Wisdom</th>
               <th>Charisma</th></tr>
             <tr>
             <td class="showcurrscore" id="scoreOne">15</td>
             <td class="showcurrscore" id="scoreTwo">14</td>
             <td class="showcurrscore" id="scoreThree">13</td>
             <td class="showcurrscore" id="scoreFour">12</td>
             <td class="showcurrscore" id="scoreFive">10</td>
             <td class="showcurrscore" id="scoreSix">8</td></tr>
          </table>
       </div>

       <p class="p-indent">Scores to assign:</p>
       <table id="rollTableAssign">
        <tr>
          <td id="finalOne">15</td><td><button class="leftassign" onclick="setAbility(1, 1)">assign to Str</button></td><td><button onclick="setAbility(2, 1)">assign to Dex</button></td><td><button onclick="setAbility(3, 1)">assign to Con</button></td><td><button onclick="setAbility(4, 1)">assign to Int</button></td><td><button onclick="setAbility(5, 1)">assign to Wis</button></td><td><button onclick="setAbility(6, 1)">assign to Cha</button></td>
        </tr>
        <tr>
          <td id="finalTwo">14</td><td><button class="leftassign" onclick="setAbility(1, 2)">assign to Str</button></td><td><button onclick="setAbility(2, 2)">assign to Dex</button></td><td><button onclick="setAbility(3, 2)">assign to Con</button></td><td><button onclick="setAbility(4, 2)">assign to Int</button></td><td><button onclick="setAbility(5, 2)">assign to Wis</button></td><td><button onclick="setAbility(6, 2)">assign to Cha</button></td>
        </tr>
        <tr>
          <td id="finalThree">13</td><td><button class="leftassign" onclick="setAbility(1, 3)">assign to Str</button></td><td><button onclick="setAbility(2, 3)">assign to Dex</button></td><td><button onclick="setAbility(3, 3)">assign to Con</button></td><td><button onclick="setAbility(4, 3)">assign to Int</button></td><td><button onclick="setAbility(5, 3)">assign to Wis</button></td><td><button onclick="setAbility(6, 3)">assign to Cha</button></td>
        </tr>
        <tr>
          <td id="finalFour">12</td><td><button class="leftassign" onclick="setAbility(1, 4)">assign to Str</button></td><td><button onclick="setAbility(2, 4)">assign to Dex</button></td><td><button onclick="setAbility(3, 4)">assign to Con</button></td><td><button onclick="setAbility(4, 4)">assign to Int</button></td><td><button onclick="setAbility(5, 4)">assign to Wis</button></td><td><button onclick="setAbility(6, 4)">assign to Cha</button></td>
        </tr>
        <tr>
          <td id="finalFive">10</td><td><button class="leftassign" onclick="setAbility(1, 5)">assign to Str</button></td><td><button onclick="setAbility(2, 5)">assign to Dex</button></td><td><button onclick="setAbility(3, 5)">assign to Con</button></td><td><button onclick="setAbility(4, 5)">assign to Int</button></td><td><button onclick="setAbility(5, 5)">assign to Wis</button></td><td><button onclick="setAbility(6, 5)">assign to Cha</button></td> 
        </tr>
        <tr>
          <td id="finalSix">8</td><td><button class="leftassign" onclick="setAbility(1, 6)">assign to Str</button></td><td><button onclick="setAbility(2, 6)">assign to Dex</button></td><td><button onclick="setAbility(3, 6)">assign to Con</button></td><td><button onclick="setAbility(4, 6)">assign to Int</button></td><td><button onclick="setAbility(5, 6)">assign to Wis</button></td><td><button onclick="setAbility(6, 6)">assign to Cha</button></td>
        </tr>
       </table>
       <button class="scoreassign" onclick="checkAbilityScores()">Done assigning scores</button>
       </div>

       <div class="homepage-info" id="raceAbilityScores" style="display:none;">
       <p>Nice work! Now you get ability score increases based on your race:</p> 
       EOT;

       echo "<p id=\"charraceinfo\">" . $chosenrace . "</p>";

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
             <td class="showcurrscore" id="scoreOneRace">15</td>
             <td class="showcurrscore" id="scoreTwoRace">14</td>
             <td class="showcurrscore" id="scoreThreeRace">13</td>
             <td class="showcurrscore" id="scoreFourRace">12</td>
             <td class="showcurrscore" id="scoreFiveRace">10</td>
             <td class="showcurrscore" id="scoreSixRace">8</td></tr>
          </table>
       </div>

       </div>

       <div class="homepage-info" id="halfElfScore" style="display:none;">
       <p>Because you are a Half-Elf, you also get to choose two ability scores to increase by 1 each.</p> 
       <p class="p-indent">Scores available to increase:</p>
       <table id="raceTableAssign">
        <tr>
          <td id="halfElfOne">15</td><td><button class="leftassign" onclick="incrAbility(0, 1)">increase Strength</button></td>
          <td><button class="leftassign" onclick="incrAbility(0, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElfTwo">14</td><td><button class="leftassign" onclick="incrAbility(1, 1)">increase Dexterity</button></td>
          <td><button class="leftassign" onclick="incrAbility(1, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElfThree">13</td><td><button class="leftassign" onclick="incrAbility(2, 1)">increase Constitution</button></td>
          <td><button class="leftassign" onclick="incrAbility(2, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElfFour">12</td><td><button class="leftassign" onclick="incrAbility(3, 1)">increase Intelligence</button></td>
          <td><button class="leftassign" onclick="incrAbility(3, -1)">undo increase</button></td>
        </tr>
        <tr>
          <td id="halfElfFive">10</td><td><button class="leftassign" onclick="incrAbility(4, 1)">increase Wisdom</button></td>
          <td><button class="leftassign" onclick="incrAbility(4, -1)">undo increase</button></td>
        </tr>
       </table>
       <button class="scoreassign" onclick="checkRaceIncreases()">Done choosing increases</button> 
       </div>

       EOT;

    }

    echo <<<EOT

    <script>

       var rollsToShow = [];
       var scoresToAssign = [];
       var abilityScoresFinal = [];
       var abilityMods = [];
       var otherStats = [];

       // Rolls numDice number of dice, with each die of numSides dimension.
       // Returns an array (sorted descending) of the numbers rolled.
       function rollDice(numDice, numSides) {
          var i;
          var currentDie;
          var rollsArray = [];

          for (i = 0; i < numDice; i++) {
             // get a random integer from 1 to numSides
             currentDie = Math.floor(Math.random() * numSides) + 1; 
             // add current result to array
             rollsArray.push(currentDie); 
          } 

          // sort array descending
          rollsArray.sort(function(a, b) {return b - a});
          return rollsArray;
       }

       // Displays either a new set of rolls or the default rolls,
       // depending on the user's choice. 
       function showRoll(rolloption) {

          // user chose to re-roll 
          if (rolloption == 1) {

             rollsToShow = [];

             // roll 4d6 and add up the 3 highest numbers 
             // do this 6 times
             var i;
             var currArray = []; 
             var currTotal;

             for (i = 0; i < 6; i++) {
                currArray = rollDice(4, 6);
                currTotal = currArray[0] + currArray[1] + currArray[2]; 
                rollsToShow.push(currTotal);
             }  

             // sort descending
             rollsToShow.sort(function(a, b) {return b - a});

          } else {
             // user chose to use default rolls 
             rollsToShow = [15, 14, 13, 12, 10, 8];
          }  

          // display rolls
          document.getElementById('rollOne').innerHTML = rollsToShow[0];
          document.getElementById('rollTwo').innerHTML = rollsToShow[1];
          document.getElementById('rollThree').innerHTML = rollsToShow[2];
          document.getElementById('rollFour').innerHTML = rollsToShow[3];
          document.getElementById('rollFive').innerHTML = rollsToShow[4];
          document.getElementById('rollSix').innerHTML = rollsToShow[5];
          // set scores
          document.getElementById('finalOne').innerHTML = rollsToShow[0];
          document.getElementById('finalTwo').innerHTML = rollsToShow[1];
          document.getElementById('finalThree').innerHTML = rollsToShow[2];
          document.getElementById('finalFour').innerHTML = rollsToShow[3];
          document.getElementById('finalFive').innerHTML = rollsToShow[4];
          document.getElementById('finalSix').innerHTML = rollsToShow[5];
          scoresToAssign = rollsToShow.slice(); 
       }

       function showScores() {
          // show current scores
          abilityScoresFinal = scoresToAssign.slice();
          document.getElementById('scoreOne').innerHTML = scoresToAssign[0];
          document.getElementById('scoreTwo').innerHTML = scoresToAssign[1];
          document.getElementById('scoreThree').innerHTML = scoresToAssign[2];
          document.getElementById('scoreFour').innerHTML = scoresToAssign[3];
          document.getElementById('scoreFive').innerHTML = scoresToAssign[4];
          document.getElementById('scoreSix').innerHTML = scoresToAssign[5];
          document.getElementById('assignAbilityScores').style.display = "block";
          document.getElementById('initialRolls').style.display = "none";
       }

       // Allows user to assign their rolled numbers to various ability scores. 
       function setAbility(abilitychoice, whichNum) {
          var scoreIdx = abilitychoice - 1;
          var statVal = whichNum - 1; 

          switch (abilitychoice) {
             case 1:
                abilityScoresFinal[scoreIdx] = scoresToAssign[statVal];
                document.getElementById('scoreOne').innerHTML = abilityScoresFinal[scoreIdx]; 
                break;
             case 2:
                abilityScoresFinal[scoreIdx] = scoresToAssign[statVal];
                document.getElementById('scoreTwo').innerHTML = abilityScoresFinal[scoreIdx];
                break;
             case 3:
                abilityScoresFinal[scoreIdx] = scoresToAssign[statVal];
                document.getElementById('scoreThree').innerHTML = abilityScoresFinal[scoreIdx];
                break;
             case 4:
                abilityScoresFinal[scoreIdx] = scoresToAssign[statVal];
                document.getElementById('scoreFour').innerHTML = abilityScoresFinal[scoreIdx];
                break;
             case 5:
                abilityScoresFinal[scoreIdx] = scoresToAssign[statVal];
                document.getElementById('scoreFive').innerHTML = abilityScoresFinal[scoreIdx];
                break;
             case 6: 
                abilityScoresFinal[scoreIdx] = scoresToAssign[statVal];
                document.getElementById('scoreSix').innerHTML = abilityScoresFinal[scoreIdx];
                break;
             default:
                console.log("problem with switch");
          } 
       }

       // Validates user's score assignments and adds any extra increases. 
       function checkAbilityScores() {

          // copy score values to temp array 
          var i;
          var tempScores = [];

          for (i = 0; i < 6; i++) {
             tempScores.push(abilityScoresFinal[i]); 
          }

          // sort temp array and check for invalid score choices
          tempScores.sort(function(a, b) {return b - a}); 
          var scoresValid = 1;
          var j;
          for (j = 0; j < 6; j++) {
             if (tempScores[j] != scoresToAssign[j]) {
                scoresValid = 0;
                break;    
             } 
          } 

          // notify user if score assignments are invalid
          if (scoresValid == 0) {
             alert("Each available number must be used exactly once.");
          } else {

             var racefinal = document.getElementById('charraceinfo').innerHTML;

             switch (racefinal) {
                case "Dragonborn":
                   abilityScoresFinal[0] += 2;
                   abilityScoresFinal[5] += 1; 
                   document.getElementById('scoreOneRace').style.color = "#4bd896";
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   break;
                case "Dwarf":
                   abilityScoresFinal[2] += 2;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   break;
                case "Hill Dwarf":
                   abilityScoresFinal[2] += 2;
                   abilityScoresFinal[4] += 1;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreFiveRace').style.color = "#4bd896";
                   break;                  
                case "Mountain Dwarf":
                   abilityScoresFinal[2] += 2;
                   abilityScoresFinal[0] += 2;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreOneRace').style.color = "#4bd896";
                   break;
                case "Elf":
                   abilityScoresFinal[1] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   break;
                case "High Elf":
                   abilityScoresFinal[1] += 2;
                   abilityScoresFinal[3] += 1;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   break;
                case "Drow":
                   abilityScoresFinal[1] += 2;
                   abilityScoresFinal[5] += 1;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   break;
                case "Wood Elf":
                   abilityScoresFinal[1] += 2;
                   abilityScoresFinal[4] += 1;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFiveRace').style.color = "#4bd896";
                   break;
                case "Halfling":
                   abilityScoresFinal[1] += 2;
                   break;
                case "Lightfoot Halfling":
                   abilityScoresFinal[5] += 1;
                   abilityScoresFinal[1] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   break;
                case "Stout Halfling":
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[1] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   break;
                case "Gnome":
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   break;
                case "Forest Gnome":
                   abilityScoresFinal[1] += 1;
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   break;
                case "Rock Gnome":
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   break;
                case "Deep Gnome":
                   abilityScoresFinal[1] += 1;
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   break;
                case "Half-Elf":
                   abilityScoresFinal[5] += 2;
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   break;
                case "Half-Orc":
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[0] += 2;
                   document.getElementById('scoreOneRace').style.color = "#4bd896"; 
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   break;                
                case "Tiefling":
                   abilityScoresFinal[3] += 1;
                   abilityScoresFinal[5] += 2;
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   break;
                case "Human":
                   abilityScoresFinal[0] += 1;
                   abilityScoresFinal[1] += 1;
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[3] += 1;
                   abilityScoresFinal[4] += 1;
                   abilityScoresFinal[5] += 1;
                   document.getElementById('scoreOneRace').style.color = "#4bd896";
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   document.getElementById('scoreFiveRace').style.color = "#4bd896";
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   break;
                default:
                   console.log("problem with ability increase");
             }
             document.getElementById('scoreOneRace').innerHTML = abilityScoresFinal[0];
             document.getElementById('scoreTwoRace').innerHTML = abilityScoresFinal[1];
             document.getElementById('scoreThreeRace').innerHTML = abilityScoresFinal[2];
             document.getElementById('scoreFourRace').innerHTML = abilityScoresFinal[3];
             document.getElementById('scoreFiveRace').innerHTML = abilityScoresFinal[4];
             document.getElementById('scoreSixRace').innerHTML = abilityScoresFinal[5];
             document.getElementById('raceAbilityScores').style.display = "block";
             document.getElementById('assignAbilityScores').style.display = "none";

             if (racefinal == "Half-Elf") {
                document.getElementById('halfElfOne').innerHTML = abilityScoresFinal[0];
                document.getElementById('halfElfTwo').innerHTML = abilityScoresFinal[1];
                document.getElementById('halfElfThree').innerHTML = abilityScoresFinal[2];
                document.getElementById('halfElfFour').innerHTML = abilityScoresFinal[3];
                document.getElementById('halfElfFive').innerHTML = abilityScoresFinal[4];
                document.getElementById('halfElfScore').style.display = "block";

             } 

          } 

       } 

       function incrAbility(abilityIdx, incrOrDecr) {
          var desiredValue;
          var saveScores = [];

          var i;
          for (i = 0; i < 6; i++) {
             saveScores.push(abilityScoresFinal[i]);
          } 

          if (incrOrDecr == 1) {
             desiredValue = abilityScoresFinal[abilityIdx] + 1; 
             // cannot increase any one stat by more than 1
             if (desiredValue - saveScores[abilityIdx]) > 1 {
                alert("This score cannot be increased more than once.");  
             } else {
                abilityScoresFinal[abilityIdx] = desiredValue;
             } 
          } else {
             desiredValue = abilityScoresFinal[abilityIdx] - 1;
             // cannot decrease below original score
             if (desiredValue >= saveScores[abilityIdx]) {
                abilityScoresFinal[abilityIdx] = desiredValue; 
             } 
          }
       }

       function checkRaceIncreases() {
          console.log("checking race increases");
       }

    </script>

    EOT;

    echo "</body></html>";

} else {

    header("Location: https://dnd-chargen.herokuapp.com/login.php");

} 

?>
