<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/view_authors");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    /*--Initialization--*/
    $id  = sanitize_input($_POST["id"]);
    $name  = sanitize_input($_POST["name"]);
    $email  = strtolower(sanitize_input($_POST["email"]));
    $old_email  = strtolower(sanitize_input($_POST["old_email"]));
    $password  = sanitize_input($_POST["password"]);
    $password2 = sanitize_input($_POST["password2"]);
    $is_admin  = isset($_POST["admin"]);
    $about = sanitize_input($_POST["about"]);
    
    $errors = array();
    $messages = array();



    if($name !== "") {
        // Validation
        if(strlen($name) < 3 || strlen($name) > 20){
            array_push($errors,"Name should be between 3 - 20 characters.");
        }
        if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            array_push($errors,"Only letters and white space allowed in name.");
        }

        // Query
        if (count($errors) === 0) {
        mysqli_query($connection, "UPDATE `authors` SET `name` = '{$name}' WHERE `id` = {$id}");
        }
    }

    if($password !== ""){
        if(strlen($password) < 6 || strlen($password) > 40)
            array_push($errors,"Password should be between 6 - 40 characters.");

        if($password !== $password2)
            array_push($errors,"Passwords do not match.");
        
        // Query
        if (count($errors) === 0) {
            $hash_password = password_hash($password,PASSWORD_BCRYPT);
            mysqli_query($connection, "UPDATE `authors` SET `password` = '{$hash_password}' WHERE `id` = {$id}");
        }
    }
    
    if($email !== "" && $email !== $old_email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            array_push($errors,"Invalid email format");

        if(mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(`email`) FROM `authors` WHERE `email` = '{$email}'"))[0] > 0) {
            array_push($errors,"Email is already in use. Use a different one.");
        }

        // Query
        if (count($errors) === 0) {
            mysqli_query($connection, "UPDATE `authors` SET `email` = '{$email}' WHERE `id` = {$id}");
        }
    }
    


    /*--Queries--*/
    if(count($errors) === 0){
        array_push($messages,"Changes saved.");
        $_SESSION["messages"] = $messages;
        header("Location: ../../cms/view_authors");
    }
    else{
        //validation failed
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/view_authors");
    }
}
else {
    header("Location: ../../cms/view_authors");
    die("Bad Request");
}
?>