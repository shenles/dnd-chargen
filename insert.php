<?php

session_start();

if (isset($_SESSION['user_id'])) {
    console_log("hello");
}

?>
