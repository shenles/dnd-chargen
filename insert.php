<?php

session_start();

if (isset($_SESSION['user_id'])) {

    $charname = $_POST['charname'];
    $charclass = $_POST['charclass'];
    $charrace = $_POST['charrace'];
    $lvl = 1;
    $charalignment = $_POST['charalign'];
    $strength = $_POST['strength'];
    $dex = $_POST['dex'];
    $constitution = $_POST['con'];
    $intell = $_POST['intell'];
    $wis = $_POST['wis'];
    $charisma = $_POST['cha'];
    $ac = $_POST['ac'];
    $hp = $_POST['hp'];
    $hd = $_POST['hitdice'];
    $pb = $_POST['profbonus'];
    $initiative = $_POST['initiative'];
    $speed = $_POST['speed'];
    $dark = $_POST['darkvision'];
    $saves = $_POST['saveprofs'];
    $skills = $_POST['skillprofs'];
    $tools = $_POST['toolprofs'];
    $weapons = $_POST['weaponprofs'];
    $armor = $_POST['armorprofs'];
    $bg = $_POST['charbg'];
    $langs = $_POST['langs']; 
    $eq = $_POST['equip'];
    $clfeats = NULL;
    $bgfeats = NULL;
    $traits = NULL;
    $spclass = $_POST['spclass'];
    $spabil = $_POST['spabil'];
    $spsavedc = $_POST['spsavedc'];
    $spatkbonus = $_POST['spatkbonus'];
    $spslots = NULL;
    $spknown = NULL;
    $disp = 1;
    $uid = $_SESSION['user_id'];

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

    $query = "INSERT INTO characters (charname,class,race,level,alignment,strength,dex,con,intell,wis,cha,ac,hp,hitdice,profbonus,initiative,speed,darkvision,saveprofs,skillprofs,toolprofs,weaponprofs,armorprofs,background,langs,equip,classfeatures,bgfeatures,racetraits,spellclass,spellabil,spellsavedc,spellatkbonus,spellslots,spellsknown,user_id,display) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($query);

    $stmt->bind_param("sssisiiiiiiiisiiissssssssssssssiissii", $charname,$charclass,$charrace,$lvl,$charalignment,$strength,$dex,$constitution,$intell,$wis,$charisma,$ac,$hp,$hd,$pb,$initiative,$speed,$dark,$saves,$skills,$tools,$weapons,$armor,$bg,$langs,$eq,$clfeats,$bgfeats,$traits,$spclass,$spabil,$spsavedc,$spatkbonus,$spslots,$spknown,$uid,$disp);

    $stmt->execute();
    $stmt->close();
    $conn->close();
}

?>
