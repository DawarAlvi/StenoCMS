<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/homepage");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $title           = sanitize_input($_POST["banner_contact_title"]);
    $caption         = sanitize_input($_POST["banner_contact_caption"]);
    
    /*handle image*/
    if($_FILES["banner_contact_bg"]["error"] === 0)
        save_image($_FILES["banner_contact_bg"], "../../img/banner/contact.jpg");
    elseif($_FILES["banner_contact_bg"]["error"] !== 4) {
        header("Location: ../../cms/contact");
        die;
    }


    /*Perform Queries*/

    if($title !== "") {
        update_query("main_pages", "title", $title, "page_name", "contact");
    }
    if($caption !== "") {
        update_query("main_pages", "caption", $caption, "page_name", "contact");
    }
    


    /*if Errors*/
    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/contact");
        die("Error: Validation failed");
    }
    else {
        array_push($messages, "Changes saved.");
        $_SESSION["messages"] = $messages;
        header("Location: ../../cms/contact");
        die;
    }
}
else {
    header("Location: ../../cms/contact");
    die("Error: Bad Request");
}
?>