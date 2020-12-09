<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/about");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $title           = sanitize_input($_POST["banner_about_title"]);
    $caption         = sanitize_input($_POST["banner_about_caption"]);


    $section_1_title    = sanitize_input($_POST["section_1_title"]);
    $section_1_content  = $_POST["section_1_content"];

    if(isset($_POST["show_section_feature"]))
        $show_section_feature = "1";
    else
        $show_section_feature = "0";


    if(isset($_POST["show_section_2"]))
        $show_section_2 = "1";
    else
        $show_section_2 = "0";

    $section_2_title    = sanitize_input($_POST["section_2_title"]);
    $section_2_content  = $_POST["section_2_content"];
    
    /*handle image*/
    if($_FILES["banner_about_bg"]["error"] === 0)
        save_image($_FILES["banner_about_bg"], "../../img/banner/about.jpg");
    elseif($_FILES["banner_about_bg"]["error"] !== 4) {
        header("Location: ../../cms/about");
        die("Error: Validation failed");
    }


    /*Perform Queries*/
    /*--BANNER--*/
    if($title !== "") {
        update_query("main_pages", "title", $title, "page_name", "about");
    }
    if($caption !== "") {
        update_query("main_pages", "caption", $caption, "page_name", "about");
    }
    
    /*--ABOUT PAGE--*/
    if($section_1_title !== "") {
        update_query("about", "value", $section_1_title, "name", "section_1_title");
    }
    if($section_1_content !== "") {
        update_query("about", "value", $section_1_content, "name", "section_1_content");
    }
    
    update_query("about", "value", $show_section_feature, "name", "show_section_feature");
    update_query("about", "value", $show_section_2, "name", "show_section_2");

    if($section_2_title !== "") {
        update_query("about", "value", $section_2_title, "name", "section_2_title");
    }
    if($section_2_content !== "") {
        update_query("about", "value", $section_2_content, "name", "section_2_content");
    }


    /*if Errors*/
    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/about");
        die("Error: Validation failed");
    }
    else {
        array_push($messages, "Changes saved.");
        $_SESSION["messages"] = $messages;
        header("Location: ../../cms/about");
    }
}
else {
    header("Location: ../../cms/about");
    die("Error: Bad Request");
}
?>