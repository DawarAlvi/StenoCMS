<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connect.php"); ?>
<?php
if(!isset($_POST["submit"])) header("Location: ../create_account.php");
else
{
    /*--Initialization--*/
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $errors = array();



    /*--Validation--*/
    //length
    if(strlen($username) < 3 || strlen($username) > 20){
        array_push($errors,"Username should be between 3 - 20 characters.");
    }
    if(strlen($password) < 6 || strlen($password) > 40)
    array_push($errors,"Password cannot be less than 6 characters.");

    //pattern
    if(preg_match("/[^a-z]/i",$username)){
        array_push($errors,"Username cannot have symbols, numbers or spaces.");
    }

    
    $hash = password_hash($password,PASSWORD_BCRYPT);

    //uniqueness in the database



    /*--Queries--*/
    if(count($errors) === 0){
        //validation successful perform queries
    }
    else{
        //validation failed
        $_SESSION["errors"] = $errors;
        header("Location: ../create_account.php");
    }



    
    /*--Debugging--*/
    if(count($errors)){
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }



}
?>