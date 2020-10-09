<?php
require_once("../includes/db_connect.php");
require_once("../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    global $connection;
    $nameErr = $emailErr = "";
    $success = false;

    //Presence
    if(empty($_POST["name"])) {
        header("Location: ../contact");
        die("Error: Invalid input");
    }
    else {
        $name = sanitize_input($_POST["name"]);
    } 
    
    if(empty($_POST["email"])) {
        header("Location: ../contact");
        die("Error: Invalid input");
    }
    else {
        $email = sanitize_input($_POST["email"]);
    }

    if(empty($_POST["message"])) {
        header("Location: ../contact");
        die("Error: Invalid input");
    }
    else {
        $message = sanitize_input($_POST["message"]);
    }


    /*Validation*/

    //Name
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
        header("Location: ../contact");
        die("Error: Invalid input");
    }

    //Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        header("Location: ../contact");
        die("Error: Invalid input");
    }
    
    /*Query*/
    $query = "INSERT INTO `messages`(`sender`, `contents`, `email`, `date`) VALUES ('$name','$message','$email',now())";
    $result = mysqli_query($connection, $query);
    
    if($result) {
        $success = true;
        header("Location: ../contact");
    }
    else {
        header("Location: ../contact");
        die("Error");
    }
        
}
else {
    header("Location: ../contact");
    die("Error: Invalid input");
}
?>