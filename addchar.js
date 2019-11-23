var rollsToShow = [];
var scoresToAssign = [];
var abilityScoresFinal = [];
var abilityMods = [];
var saveScores = [];
var initStat;
var speedStat;
var hpmaxStat; 
var hitdiceStat;
var allRaces = [];
var racefinal = document.getElementById('charraceinfo').innerHTML;
var classfinal = document.getElementById('charclassinfo').innerHTML;

class Race {

   constructor(id, name, speed, darkvision, langs, baserace, subraces, abilityincreases, hpincrease) {
       this.id = id;
       this.name = name;
       this.speed = speed;
       this.darkvision = darkvision;
       this.langs = langs;
       this.baserace = baserace;
       this.subraces = subraces;
       this.abilityincreases = abilityincreases;
       this.hpincrease = hpincrease;
   }

}

class Score {

   constructor(id, name, value, increased) {
      this.id = id;
      this.name = name;
      this.value = value;
      this.increased = increased;
   }

}

var strength = new Score(0, "Strength", 0, -1);
var dexterity = new Score(1, "Dexterity", 0, -1);
var constitution = new Score(2, "Constitution", 0, -1);
var intelligence = new Score(3, "Intelligence", 0, -1);
var wisdom = new Score(4, "Wisdom", 0, -1);
var charisma = new Score(5, "Charisma", 0, -1);

abilityScoresFinal = [strength, dexterity, constitution, intelligence, wisdom, charisma];

var dragonborn = new Race(1, "Dragonborn", 30, 0, ["Common", "Draconic"], -1, null, {0: 2, 5: 1}, 0);
var dwarf = new Race(2, "Dwarf", 25, 60, ["Common", "Dwarvish"], -1, [3, 4], {2: 2}, 0);
var hilldwarf = new Race(3, "Hill Dwarf", 25, 60, ["Common", "Dwarvish"], 2, null, {4: 1}, 1);
var mtndwarf = new Race(4, "Mountain Dwarf", 25, 60, ["Common", "Dwarvish"], 2, null, {0: 2}, 0);
var elf = new Race(5, "Elf", 30, 60, ["Common", "Dwarvish"], -1, [6, 7, 8], {1: 2}, 0);
var highelf = new Race(6, "High Elf", 30, 60, ["Common", "Dwarvish"], 5, null, {3: 1}, 0);
var drow = new Race(7, "Drow", 30, 120, ["Common", "Dwarvish"], 5, null, {5: 1}, 0);
var woodelf = new Race(8, "Wood Elf", 35, 60, ["Common", "Dwarvish"], 5, null, {4: 1}, 0);
var halfling = new Race(9, "Halfling", 25, 0, ["Common", "Halfling"], -1, [10, 11], {1: 2}, 0);
var lightfoot = new Race(10, "Lightfoot Halfling", 25, 0, ["Common", "Halfling"], 9, null, {5: 1}, 0);
var stout = new Race(11, "Stout Halfling", 25, 0, ["Common", "Halfling"], 9, null, {2: 1}, 0);
var gnome = new Race(12, "Gnome", 25, 60, ["Common", "Gnomish"], -1, [13, 14, 15], {3: 2}, 0);
var forestgnome = new Race(13, "Forest Gnome", 25, 60, ["Common", "Gnomish"], 12, null, {1: 1}, 0);
var rockgnome = new Race(14, "Rock Gnome", 25, 60, ["Common", "Gnomish"], 12, null, {2: 1}, 0);
var deepgnome = new Race(15, "Deep Gnome", 25, 120, ["Common", "Gnomish", "Undercommon"], 12, null, {1: 1}, 0);
var halfelf = new Race(16, "Half-Elf", 25, 60, ["Common", "Elvish", "choose 1 extra"], -1, null, {5: 2}, 0);
var halforc = new Race(17, "Half-Orc", 25, 60, ["Common", "Orc"], -1, null, {0: 2, 2: 1}, 0);
var tiefling = new Race(18, "Tiefling", 25, 60, ["Common", "Infernal"], -1, null, {3: 1, 5: 2}, 0);
var human = new Race(19, "Human", 25, 0, ["Common", "choose 1 extra"], -1, null, {0: 1, 1: 1, 2: 1, 3: 1, 4: 1, 5: 1}, 0);

allRaces = [dragonborn, dwarf, hilldwarf, mtndwarf, elf, highelf, drow, woodelf, halfling, lightfoot, stout, gnome, forestgnome, rockgnome, deepgnome, halfelf, halforc, tiefling, human];

// Rolls numDice number of dice, with each die of numSides dimension.
// Returns an array (sorted descending) of the numbers rolled.
function rollDice(numDice, numSides) {
  var rollsArray = [];

  for (let i = 0; i < numDice; i++) {
     // get a random integer from 1 to numSides
     let currentDie = Math.floor(Math.random() * numSides) + 1; 
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
     for (let i = 0; i < 6; i++) {
        let currArray = rollDice(4, 6);
        let currTotal = currArray[0] + currArray[1] + currArray[2];
        rollsToShow.push(currTotal);
     }  

     // sort descending
     rollsToShow.sort(function(a, b) {return b - a});

  } else {
     // user chose to use default rolls 
     rollsToShow = [15, 14, 13, 12, 10, 8];
  }  

  // display rolls
  for (let i = 0; i < 6; i++) {

      let idToGet = "roll".concat(i.toString());
      document.getElementById(idToGet).innerHTML = rollsToShow[i];

  }

  // display scores
  for (let i = 0; i < 6; i++) {

      let idToGet = "final".concat(i.toString());
      document.getElementById(idToGet).innerHTML = rollsToShow[i];

  }

  scoresToAssign = rollsToShow.slice(); 
}

function showScores() {
  // show current scores
  if (scoresToAssign.length == 0) {
     scoresToAssign = [15, 14, 13, 12, 10, 8];
  }

  for (let i = 0; i < 6; i++) {
      abilityScoresFinal[i].value = scoresToAssign[i];
      let idToGet = "score".concat(i.toString());
      document.getElementById(idToGet).innerHTML = scoresToAssign[i];
  }

  document.getElementById('assignAbilityScores').style.display = "block";
  document.getElementById('initialRolls').style.display = "none";
}

// Allows user to assign their rolled numbers to various ability scores. 
function setAbility(abilitychoice, whichNum) {
  var scoreIdx = abilitychoice - 1;
  var statVal = whichNum - 1; 

  abilityScoresFinal[scoreIdx].value = scoresToAssign[statVal];

  for (let i = 0; i < 6; i++) {
      abilityScoresFinal[i].value = scoresToAssign[i];
      let idToGet = "score".concat(i.toString());
      document.getElementById(idToGet).innerHTML = abilityScoresFinal[i].value;
  }

}

// Validates user's score assignments and adds any extra increases. 
function checkAbilityScores() {

  // copy score values to temp array 
  var tempScores = [];

  for (let i = 0; i < 6; i++) {
     tempScores.push(abilityScoresFinal[i].value); 
  }

  // sort temp array and check for invalid score choices
  tempScores.sort(function(a, b) {return b - a}); 
  var scoresValid = 1;
  for (let j = 0; j < 6; j++) {
     if (tempScores[j] != scoresToAssign[j]) {
        scoresValid = 0;
        break;    
     } 
  } 

  // notify user if score assignments are invalid
  if (scoresValid == 0) {
     alert("Each available number must be used exactly once.");
  } else {

     var matchrace;

     for (let raceidx = 0; raceidx < allRaces.length; raceidx++) {

        matchrace = allRaces[raceidx];

        // find the chosen race in the array of all races
        if (matchrace.name == racefinal) {
           // check if this race grants any ability score increases
           for (let i = 0; i < 6; i++) {
              if (i in matchrace.abilityincreases) {
                  abilityScoresFinal[i].value += matchrace.abilityincreases[i];
                  abilityScoresFinal[i].increased = 1;
              }
           }

           speedStat = matchrace.speed;
           break;

        }

     }


     // update displayed scores
     for (let i = 0; i < 6; i++) {

         let idToGet = "scoreRace".concat(i.toString());
         document.getElementById(idToGet).innerHTML = abilityScoresFinal[i].value;

     }

     document.getElementById('raceAbilityScores').style.display = "block";
     document.getElementById('assignAbilityScores').style.display = "none";

     // display new scores; Charisma is unchanged, as that ability was already increased previously
     if (racefinal == "Half-Elf") {

        for (let i = 0; i < 5; i++) {

           let idToGet = "halfElf".concat(i.toString());
           document.getElementById(idToGet).innerHTML = abilityScoresFinal[i].value;

        }

        document.getElementById('halfElfScore').style.display = "block";

     } else {
        finalizeStats();
        document.getElementById('finishStats').style.display = "block";
     } 

  } 

} 

function incrAbility(abilityIdx, incrOrDecr) {
  var desiredValue;
  for (let i = 0; i < 6; i++) {
     saveScores.push(abilityScoresFinal[i].value);
  } 

  if (incrOrDecr == 1) {
     desiredValue = abilityScoresFinal[abilityIdx].value + 1; 
     // cannot increase any one stat by more than 1
     if (desiredValue - saveScores[abilityIdx] > 1) {
        alert("This score cannot be increased more than once.");  
     } else {
        abilityScoresFinal[abilityIdx].value = desiredValue;
     } 

  } else {
     desiredValue = abilityScoresFinal[abilityIdx].value - 1;
     // cannot decrease below original score
     if (desiredValue >= saveScores[abilityIdx]) {
        abilityScoresFinal[abilityIdx].value = desiredValue; 
     } 
  }

  // display new scores; Charisma remains unchanged
  for (let i = 0; i < 5; i++) {

      let idToGet = "halfElf".concat(i.toString());
      document.getElementById(idToGet).innerHTML = abilityScoresFinal[i].value;

  }

}

// Calculates the ability score modifier for a given ability score.
function calcModifier(score) {
  let intMod = Math.floor((score - 10) / 2);
  return intMod;
}

function finalizeStats() {

  // update displayed scores
  for (let i = 0; i < 6; i++) {

      let idToGet = "scoreFinish".concat(i.toString());
      document.getElementById(idToGet).innerHTML = abilityScoresFinal[i].value;

  }

  // calculate modifiers based on ability scores
  var plusMods = [];
  for (let i = 0; i < 6; i++) {
     let currMod = calcModifier(abilityScoresFinal[i].value);
     abilityMods.push(currMod);
     if (currMod < 0) {
        plusMods.push(currMod); 
     } else {
        plusMods.push("+".concat(currMod));
     } 
  } 

  // update displayed ability modifiers
  for (let i = 0; i < 6; i++) {

      let idToGet = "modifier".concat(i.toString());
      document.getElementById(idToGet).innerHTML = abilityMods[i];

  }
 
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

  var statsRaised = 0; 
  for (let i = 0; i < 6; i++) {
     if (abilityScoresFinal[i].value > saveScores[i]) {
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
