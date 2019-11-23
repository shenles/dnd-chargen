       var rollsToShow = [];
       var scoresToAssign = [];
       var abilityScoresFinal = [];
       var abilityMods = [];
       var saveScores = [];
       var initStat;
       var speedStat;
       var hpmaxStat; 
       var hitdiceStat;
       var racefinal = document.getElementById('charraceinfo').innerHTML;
       var classfinal = document.getElementById('charclassinfo').innerHTML;      

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
          if (scoresToAssign.length == 0) {
             scoresToAssign = [15, 14, 13, 12, 10, 8];
          }
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

             switch (racefinal) {
                case "Dragonborn":
                   abilityScoresFinal[0] += 2;
                   abilityScoresFinal[5] += 1; 
                   document.getElementById('scoreOneRace').style.color = "#4bd896";
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   speedStat = 30;
                   break;
                case "Dwarf":
                   abilityScoresFinal[2] += 2;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Hill Dwarf":
                   abilityScoresFinal[2] += 2;
                   abilityScoresFinal[4] += 1;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreFiveRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;                  
                case "Mountain Dwarf":
                   abilityScoresFinal[2] += 2;
                   abilityScoresFinal[0] += 2;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreOneRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Elf":
                   abilityScoresFinal[1] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   speedStat = 30;
                   break;
                case "High Elf":
                   abilityScoresFinal[1] += 2;
                   abilityScoresFinal[3] += 1;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   speedStat = 30;
                   break;
                case "Drow":
                   abilityScoresFinal[1] += 2;
                   abilityScoresFinal[5] += 1;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   speedStat = 30;
                   break;
                case "Wood Elf":
                   abilityScoresFinal[1] += 2;
                   abilityScoresFinal[4] += 1;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFiveRace').style.color = "#4bd896";
                   speedStat = 35;
                   break;
                case "Halfling":
                   abilityScoresFinal[1] += 2;
                   speedStat = 25;
                   break;
                case "Lightfoot Halfling":
                   abilityScoresFinal[5] += 1;
                   abilityScoresFinal[1] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Stout Halfling":
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[1] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Gnome":
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Forest Gnome":
                   abilityScoresFinal[1] += 1;
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Rock Gnome":
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Deep Gnome":
                   abilityScoresFinal[1] += 1;
                   abilityScoresFinal[3] += 2;
                   document.getElementById('scoreTwoRace').style.color = "#4bd896"; 
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   speedStat = 25;
                   break;
                case "Half-Elf":
                   abilityScoresFinal[5] += 2;
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   speedStat = 30;
                   break;
                case "Half-Orc":
                   abilityScoresFinal[2] += 1;
                   abilityScoresFinal[0] += 2;
                   document.getElementById('scoreOneRace').style.color = "#4bd896"; 
                   document.getElementById('scoreThreeRace').style.color = "#4bd896";
                   speedStat = 30;
                   break;                
                case "Tiefling":
                   abilityScoresFinal[3] += 1;
                   abilityScoresFinal[5] += 2;
                   document.getElementById('scoreSixRace').style.color = "#4bd896";
                   document.getElementById('scoreFourRace').style.color = "#4bd896";
                   speedStat = 30;
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
                   speedStat = 30;
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
             } else {
                finalizeStats();
                document.getElementById('finishStats').style.display = "block";
             } 

          } 

       } 

       function incrAbility(abilityIdx, incrOrDecr) {
          var desiredValue;
          var i;
          for (i = 0; i < 6; i++) {
             saveScores.push(abilityScoresFinal[i]);
          } 

          if (incrOrDecr == 1) {
             desiredValue = abilityScoresFinal[abilityIdx] + 1; 
             // cannot increase any one stat by more than 1
             if (desiredValue - saveScores[abilityIdx] > 1) {
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

          // display new scores
          switch (abilityIdx) {
             case 0:
                document.getElementById('halfElfOne').innerHTML = abilityScoresFinal[0];
             case 1:
                document.getElementById('halfElfTwo').innerHTML = abilityScoresFinal[1];
             case 2:
                document.getElementById('halfElfThree').innerHTML = abilityScoresFinal[2];
             case 3:
                document.getElementById('halfElfFour').innerHTML = abilityScoresFinal[3];
             case 4:
                document.getElementById('halfElfFive').innerHTML = abilityScoresFinal[4];
             default:
                console.log("problem updating display");
          } 

       }

       // Calculates the ability score modifier for a given ability score.
       function calcModifier(score) {
          var intMod = Math.floor((score - 10) / 2);
          return intMod;
       }

       function finalizeStats() {
          document.getElementById('scoreOneFinish').innerHTML = abilityScoresFinal[0];
          document.getElementById('scoreTwoFinish').innerHTML = abilityScoresFinal[1];
          document.getElementById('scoreThreeFinish').innerHTML = abilityScoresFinal[2];
          document.getElementById('scoreFourFinish').innerHTML = abilityScoresFinal[3];
          document.getElementById('scoreFiveFinish').innerHTML = abilityScoresFinal[4];
          document.getElementById('scoreSixFinish').innerHTML = abilityScoresFinal[5];

          // calculate modifiers based on ability scores
          var i;
          var currMod;
          var plusMods = [];
          for (i = 0; i < 6; i++) {
             currMod = calcModifier(abilityScoresFinal[i]);
             abilityMods.push(currMod);
             if (currMod < 0) {
                plusMods.push(currMod); 
             } else {
                plusMods.push("+".concat(currMod));
             } 
          } 

          document.getElementById('modifierOne').innerHTML = abilityMods[0];
          document.getElementById('modifierTwo').innerHTML = abilityMods[1];
          document.getElementById('modifierThree').innerHTML = abilityMods[2];
          document.getElementById('modifierFour').innerHTML = abilityMods[3];
          document.getElementById('modifierFive').innerHTML = abilityMods[4];
          document.getElementById('modifierSix').innerHTML = abilityMods[5];
         
          var maxroll;

          switch (classfinal) {
             case "Sorcerer":
             case "Wizard":
                maxroll = 6;
                break;
             case "Warlock":
             case "Rogue":
             case "Monk":
             case "Druid":
             case "Cleric":
             case "Bard":
                maxroll = 8;
                break;
             case "Fighter":
             case "Paladin":
             case "Ranger":
                maxroll = 10;
                break;
             case "Barbarian":
                maxroll = 12;
                break; 
             default:
                maxroll = 0; 
          }

          initStat = plusMods[1];
          hpmaxStat = maxroll + abilityMods[2];

          if (racefinal == "Hill Dwarf") {
              hpmaxStat += 1;
          }

          hitdiceStat = "1d".concat(maxroll.toString()); 
          document.getElementById('initiative').innerHTML = initStat;
          document.getElementById('hpmax').innerHTML = hpmaxStat; 
          document.getElementById('hitdice').innerHTML = hitdiceStat;
          document.getElementById('speed').innerHTML = speedStat;
       }

       function checkRaceIncreases() {
          console.log("checking race increases");
          var i;
          var statsRaised = 0; 
          for (i = 0; i < 6; i++) {
             if (abilityScoresFinal[i] > saveScores[i]) {
                statsRaised += 1;
             } 
          }

          if (statsRaised != 2) {
             alert("You must increase exactly two scores by 1 each.");
          } else {        
             finalizeStats();
             document.getElementById('halfElfScore').style.display = "none"; 
             document.getElementById('finishStats').style.display = "block";
          }
       }

       function startManual() {
          console.log("starting manual entry of stats");
       } 
