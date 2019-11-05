<?php

session_start();

if (isset($_SESSION['user_id'])) {

    echo "Accessing logged in page";

} else {

    header("Location: http://dnd-chargen.herokuapp.com/login.php");

} 

?>
