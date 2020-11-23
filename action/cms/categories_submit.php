<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/categories");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $title           = sanitize_input($_POST["banner_categories_title"]);
    $caption         = sanitize_input($_POST["banner_categories_caption"]);
    
    /*handle image*/
    if($_FILES["banner_categories_bg"]["error"] === 0)
        save_image($_FILES["banner_categories_bg"], "../../img/banner/categories.jpg");
    elseif($_FILES["banner_categories_bg"]["error"] !== 4) {
        header("Location: ../../cms/categories");
        die("Error: Validation failed");
    }


    /*Perform Queries*/

    if($title !== "") {
        update_query("main_pages", "title", $title, "page_name", "categories");
    }
    if($caption !== "") {
        update_query("main_pages", "caption", $caption, "page_name", "categories");
    }
    


    /*if Errors*/
    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/categories");
        die("Error: Validation failed");
    }
    else {
        array_push($messages, "Changes saved.");
        $_SESSION["messages"] = $messages;
        header("Location: ../../cms/categories");
    }
}
else {
    header("Location: ../../cms/categories");
    die("Error: Bad Request");
}
?>