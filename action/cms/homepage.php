<?php
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    global $connection;
    
    echo("<pre>");
    print_r($_POST);
    echo("</pre>");
}
else {
    header("Location: ../../cms/homepage.php");
    die("Error: Bad Request");
}
?>