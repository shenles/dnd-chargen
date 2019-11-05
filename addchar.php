<?php

session_start();

if (isset($_SESSION['user_id'])) {

    echo "<html>\n<head>\n<title>Login</title><link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">\n<link rel=\"stylesheet\" type=\"text/css\" href=\"./style.css\"></head>";

    echo "<body><div class=\"homepage-info\">";
    echo "Accessing logged in page";
    echo "</div></body></html>";

} else {

    header("Location: https://dnd-chargen.herokuapp.com/login.php");

} 

?>
