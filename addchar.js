var rollsToShow = [];
var scoresToAssign = [];
var abilityScoresFinal = [];
var initStat;
var speedStat;
var hpmaxStat;
var profBonus;
var saveScores = [];
var allRaces = [];
var allClasses = [];
var allSkills = [];
var racefinal;
var classfinal;
var bgfinal;

class Race {
   constructor(id, name, speed, darkvision, langs, baserace, subraces, abilityincreases) {
       this.id = id;
       this.name = name;
       this.speed = speed;
       this.darkvision = darkvision;
       this.langs = langs;
       this.baserace = baserace;
       this.subraces = subraces;
       this.abilityincreases = abilityincreases;
   }
}

class DndClass {
    constructor(id, name, hitdie, armorprofs, weaponprofs, toolprofs, saves, skillprofs, spellability) {
      this.id = id;
      this.name = name;
      this.hitdie = hitdie;
      this.armorprofs = armorprofs;
      this.weaponprofs = weaponprofs;
      this.toolprofs = toolprofs;
      this.saves = saves;
      this.skillprofs = skillprofs;
      this.spellability = spellability;
    }
}

class Background {
   constructor(id, name, langs, skillprofs) {
      this.id = id;
      this.name = name;
      this.langs = langs;
      this.skillprofs = skillprofs;
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

class Character {
   constructor(id, name, dndclass, race, bg, scores, mods, otherstats, armorprofs, weaponprofs, langs, traits, features, equip, skillprofs, toolprofs) {
      this.id = id;
      this.name = name;
      this.dndclass = dndclass;
      this.race = race;
      this.bg = bg;
      this.scores = scores;
      this.mods = mods;
      this.otherstats = otherstats;
      this.armorprofs = armorprofs;
      this.weaponprofs = weaponprofs;
      this.langs = langs;
      this.traits = traits;
      this.features = features;
      this.equip = equip;
      this.skillprofs = skillprofs;
      this.toolprofs = toolprofs;
   }
}

var dragonborn = new Race(1, "Dragonborn", 30, 0, ["Common", "Draconic"], -1, [], {0: 2, 5: 1});
var dwarf = new Race(2, "Dwarf", 25, 60, ["Common", "Dwarvish"], -1, [3, 4], {2: 2});
var hilldwarf = new Race(3, "Hill Dwarf", 25, 60, ["Common", "Dwarvish"], 2, [], {4: 1});
var mtndwarf = new Race(4, "Mountain Dwarf", 25, 60, ["Common", "Dwarvish"], 2, [], {0: 2});
var elf = new Race(5, "Elf", 30, 60, ["Common", "Dwarvish"], -1, [6, 7, 8], {1: 2});
var highelf = new Race(6, "High Elf", 30, 60, ["Common", "Dwarvish"], 5, [], {3: 1});
var drow = new Race(7, "Drow", 30, 120, ["Common", "Dwarvish"], 5, [], {5: 1});
var woodelf = new Race(8, "Wood Elf", 35, 60, ["Common", "Dwarvish"], 5, [], {4: 1});
var halfling = new Race(9, "Halfling", 25, 0, ["Common", "Halfling"], -1, [10, 11], {1: 2});
var lightfoot = new Race(10, "Lightfoot Halfling", 25, 0, ["Common", "Halfling"], 9, [], {5: 1});
var stout = new Race(11, "Stout Halfling", 25, 0, ["Common", "Halfling"], 9, [], {2: 1});
var gnome = new Race(12, "Gnome", 25, 60, ["Common", "Gnomish"], -1, [13, 14, 15], {3: 2});
var forestgnome = new Race(13, "Forest Gnome", 25, 60, ["Common", "Gnomish"], 12, [], {1: 1});
var rockgnome = new Race(14, "Rock Gnome", 25, 60, ["Common", "Gnomish"], 12, [], {2: 1});
var deepgnome = new Race(15, "Deep Gnome", 25, 120, ["Common", "Gnomish", "Undercommon"], 12, [], {1: 1});
var halfelf = new Race(16, "Half-Elf", 25, 60, ["Common", "Elvish", "choose 1 extra"], -1, [], {5: 2});
var halforc = new Race(17, "Half-Orc", 25, 60, ["Common", "Orc"], -1, [], {0: 2, 2: 1});
var tiefling = new Race(18, "Tiefling", 25, 60, ["Common", "Infernal"], -1, [], {3: 1, 5: 2});
var human = new Race(19, "Human", 30, 0, ["Common", "choose 1 extra"], -1, [], {0: 1, 1: 1, 2: 1, 3: 1, 4: 1, 5: 1});
allRaces = [dragonborn, dwarf, hilldwarf, mtndwarf, elf, highelf, drow, woodelf, halfling, lightfoot, stout, gnome, forestgnome, rockgnome, deepgnome, halfelf, halforc, tiefling, human];

allSkills = {0: "Acrobatics", 1: "Animal Handling", 2: "Arcana", 3: "Athletics", 4: "Deception", 5: "History", 6: "Insight", 7: "Intimidation", 8: "Investigation", 9: "Medicine", 10: "Nature", 11: "Perception", 12: "Performance", 13: "Persuasion", 14: "Religion", 15: "Sleight of Hand", 16: "Stealth", 17: "Survival"};
var barbarian = new DndClass(1, "Barbarian", 12, ["light", "medium", "shields"], ["simple", "martial"], [], [0, 2], [2, [1, 3, 7, 10, 11, 17]], -1);
var bard = new DndClass(2, "Bard", 8, ["light"], ["simple", "hand crossbows", "longswords", "rapiers", "shortswords"], ["choose 3 musical instruments"], [1, 5], [3, ["any"]], 5);
var cleric = new DndClass(3, "Cleric", 8, ["light", "medium", "shields"], ["simple"], [], [4, 5], [2, [5, 6, 9, 13, 14]], 4);
var druid = new DndClass(4, "Druid", 8, ["light", "medium", "shields", "no metal"], ["clubs", "daggers", "darts", "javelins", "maces", "quarterstaffs", "scimitars", "sickles", "slings", "spears"], ["herbalism kit"], [3, 4], [2, [2, 1, 6, 9, 10, 11, 14, 17]], 4);
var fighter = new DndClass(5, "Fighter", 10, ["all armor", "shields"], ["simple", "martial"], [], [0, 2], [2, [0, 1, 3, 5, 6, 7, 11, 17]], 3);
var monk = new DndClass(6, "Monk", 8, [], ["simple", "shortswords"], ["choose 1 type artisan tools or 1 musical instrument"], [0, 2], [2, [0, 1, 3, 5, 6, 7, 11, 17]], 3);
var paladin = new DndClass(7, "Paladin", 10, ["all armor", "shields"], ["simple", "martial"], [], [4, 5], [2, [3, 6, 7, 9, 13, 14]], 5);
var ranger = new DndClass(8, "Ranger", 10, ["light", "medium", "shields"], ["simple", "martial"], [], [0, 1], [3, [1, 3, 6, 8, 10, 11, 16, 17]], 4);
var rogue = new DndClass(9, "Rogue", 8, ["light"], ["simple", "hand crossbows", "longswords", "rapiers", "shortswords"], ["thieves tools"], [1, 3], [4, [0, 3, 4, 6, 7, 8, 11, 12, 13, 15, 16], 3]);
var sorcerer = new DndClass(10, "Sorcerer", 6, [], ["daggers", "darts", "slings", "quarterstaffs", "light crossbows"], [], [2, 5], [2, [2, 4, 6, 7, 8, 13, 14]], 5);
var warlock = new DndClass(11, "Warlock", 8, ["light"], ["simple"], [], [4, 5], [2, [2, 4, 5, 7, 8, 10, 14]], 5);
var wizard = new DndClass(12, "Wizard", 6, [], ["daggers", "darts", "slings", "quarterstaffs", "light crossbows"], [], [3, 4], [2, [2, 5, 6, 8, 9, 14]], 3);
allClasses = [barbarian, bard, cleric, druid, fighter, monk, paladin, ranger, rogue, sorcerer, warlock, wizard];

classfinal = document.getElementById('charclassinfo').innerHTML;
racefinal = document.getElementById('charraceinfo').innerHTML;
bgfinal = document.getElementById('charbginfo').innerHTML;

var strength = new Score(0, "Strength", 0, -1);
var dexterity = new Score(1, "Dexterity", 0, -1);
var constitution = new Score(2, "Constitution", 0, -1);
var intelligence = new Score(3, "Intelligence", 0, -1);
var wisdom = new Score(4, "Wisdom", 0, -1);
var charisma = new Score(5, "Charisma", 0, -1);
abilityScoresFinal = [strength, dexterity, constitution, intelligence, wisdom, charisma];

var selectAssign = document.querySelectorAll('.assignr');
var assigns = ["Strength", "Strength", "Strength", "Strength", "Strength", "Strength"];

for (let i = 0; i < selectAssign.length; i++) {
   selectAssign[i].addEventListener('change', (event) => {
      assigns[i] = event.target.value;
   });
}

var boxes = [-1, -1, -1, -1, -1];
var boxId;
$("input[type='checkbox']").change(function() {
    boxId = Number(this.id[this.id.length - 1]);
    if (this.checked) {
        boxes[boxId] = 1;
    } else {
        boxes[boxId] = -1;
    }
});

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
 
}

// show unassigned scores after user is done rolling
function showScores() {
  if (rollsToShow.length == 0) {
     scoresToAssign = [15, 14, 13, 12, 10, 8];
  } else {
     for (let i = 0; i < rollsToShow.length; i++) {
        scoresToAssign.push(rollsToShow[i]);
     }
  }

  for (let i = 0; i < 6; i++) {
      abilityScoresFinal[i].value = scoresToAssign[i];
      let idToGet = "score".concat(i.toString());
      document.getElementById(idToGet).innerHTML = scoresToAssign[i];
  }

  document.getElementById('initialRolls').style.display = "none";
  document.getElementById('assignAbilityScores').style.display = "block";
}

// Validates user's score assignments and adds any extra increases. 
function checkAbilityScores() {
    // alert user of invalid or incomplete score assignments
    var counts = {"Strength": 0, "Dexterity": 0, "Constitution": 0, "Intelligence": 0, "Wisdom": 0, "Charisma": 0};

    for (let i = 0; i < assigns.length; i++) {
       if (assigns[i] in counts) {
          let curr = assigns[i];
          counts[curr] += 1;
       }
    }
    // each score must be assigned exactly once
    for (var key in counts) {
       if (counts[key] != 1) {
          alert("Each score must be used exactly once.");
          return;
       }
    }
    // assign the scores to the correct abilities
    for (let i = 0; i < scoresToAssign.length; i++) {
        var currabilname = assigns[i];
        var findscoreobj = abilityScoresFinal.find(function(element) {
            return element.name == currabilname;
        });
        findscoreobj.value = scoresToAssign[i];
    }

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
         // if a score was changed, it shows up green
         if (abilityScoresFinal[i].increased == 1) {
            document.getElementById(idToGet).style.color = "#5ab260";
         }
     }

     document.getElementById('assignAbilityScores').style.display = "none";
     document.getElementById('raceAbilityScores').style.display = "block";

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
  var abilityMods = [];

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
      document.getElementById(idToGet).innerHTML = plusMods[i];
  }

  initStat = plusMods[1];
  profBonus = 2;
  var maxroll = 0;
  var spatkmod = 0;
  var spsavedc = 0;

  for (var cl in allClasses) {
     if (cl.name == classfinal) {
        maxroll = cl.hitdie;
        if (cl.spellability > -1) {
           spatkmod = profBonus + abilityMods[cl.spellability];
           spsavedc = 8 + profBonus + abilityMods[cl.spellability];
        }
        break;
     }
  }

  hpmaxStat = maxroll + abilityMods[2];

  if (racefinal == "Hill Dwarf") {
      hpmaxStat += 1;
  }

  var hitdiceStat = "1d".concat(maxroll.toString()); 
  document.getElementById('profbonus').innerHTML = "+".concat(profBonus.toString());
  document.getElementById('initiative').innerHTML = initStat;
  document.getElementById('hpmax').innerHTML = hpmaxStat; 
  document.getElementById('hitdice').innerHTML = hitdiceStat;
  document.getElementById('speed').innerHTML = speedStat;
  document.getElementById('spatkmod').innerHTML = spatkmod;
  document.getElementById('spsavedc').innerHTML = spsavedc;
}

function checkRaceIncreases() {

  var statsRaised = 0;
  for (let i = 0; i < boxes.length; i++) {
     if (boxes[i] == 1) {
        statsRaised += 1;
     }
  }

  if (statsRaised != 2) {
     alert("You must choose exactly two scores to increase.");
  } 
  // increase each of the two chosen scores by 1 each
  for (var j = 0; j < boxes.length; j++) {
     if (boxes[j] == 1) {
         abilityScoresFinal[j].value += 1;
     }
  }       
  finalizeStats();
  document.getElementById('halfElfScore').style.display = "none"; 
  document.getElementById('finishStats').style.display = "block";
  
}

function doneWithStats() {
   document.getElementById('finishStats').style.display = "none";
   document.getElementById('raceAbilityScores').style.display = "none";
   document.getElementById('afterStats').style.display = "block";
}
