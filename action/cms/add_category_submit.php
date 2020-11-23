<?php
require_once("../../includes/session.php");
auth_user("author", "../../cms/categories");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = strtolower(sanitize_input($_POST["category_name"]));
    if($name === '') {
        array_push($errors, 'Name field cannot be empty.');
    }
    if($_FILES["category_image"]["error"] === 0 && empty($errors)) {
        // query
        $result = mysqli_query($connection, "INSERT INTO `categories` (`name`) VALUES ('{$name}')");
        if($result) {
            $id = $connection -> insert_id;
        }
        if(!save_image($_FILES["category_image"], "../../img/categories/{$id}.jpg"))
            mysqli_query($connection, "DELETE FROM `categories` WHERE `id` = {$id}");
    }
    else {
        array_push($errors,'Error: Invalid or empty image.');
        header("Location: ../../cms/categories");
        die;
    }

    /*if Errors*/
    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header('Location: ../../cms/categories');
        die;
    }
    else {
        array_push($messages, 'Category added.');
        $_SESSION['messages'] = $messages;
        header('Location: ../../cms/categories');
        die;
    }
}
else {
    header("Location: ../../cms/categories");
    die;
}
?>