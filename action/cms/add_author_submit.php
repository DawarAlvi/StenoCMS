<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connect.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    /*--Initialization--*/
    $name  = sanitize_input($_POST["name"]);
    $email  = strtolower(sanitize_input($_POST["email"]));
    $password  = sanitize_input($_POST["password"]);
    $password2 = sanitize_input($_POST["password2"]);
    $is_admin  = isset($_POST["admin"]);
    $about = sanitize_input($_POST["about"]);
    
    $errors = array();
    $messages = array();


    /*--Validation--*/
    //length
    if(strlen($name) < 3 || strlen($name) > 20){
        array_push($errors,"Name should be between 3 - 20 characters.");
    }
    if(strlen($password) < 6 || strlen($password) > 40)
        array_push($errors,"Password cannot be less than 6 characters.");

    //pattern
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        array_push($errors,"Invalid email format");
    
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
        array_push($errors,"Only letters and white space allowed in name.");
    }

    //uniqueness in the database
    if(mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(`email`) FROM `authors` WHERE `email` = '{$email}'"))[0] > 0) {
        array_push($errors,"Email is already in use. Use a different one.");
    }

    //password match
    if($password !== $password2)
        array_push($errors,"Passwords do not match.");

    /*--Queries--*/
    if(count($errors) === 0){
        $hash_password = password_hash($password,PASSWORD_BCRYPT);
        
        $query  = "INSERT INTO `authors` ";
        $query .="(`name`, `email`, `password`, `is_admin`, `about`) ";
        $query .="VALUES ('{$name}', '{$email}', '{$hash_password}', '{$is_admin}', '{$about}')";
        
        $result = mysqli_query($connection, $query);

        if($result) {
            array_push($messages,"Author created successfully.");
            $_SESSION["messages"] = $messages;
            header("Location: ../../cms/add_author.php");
        }
        else{
            array_push($errors,"Database query failed.");
            $_SESSION["errors"] = $errors;
            header("Location: ../../cms/add_author.php");
        }
    }
    else{
        //validation failed
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/add_author.php");
    }




}
else {
    //header("Location: ../../cms/add_author.php");
    die("Bad Request");
}
?>