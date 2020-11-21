<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/homepage");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $title           = sanitize_input($_POST["banner_homepage_title"]);
    $caption         = sanitize_input($_POST["banner_homepage_caption"]);

    $show_popular    = isset($_POST["show_popular"]);
    $show_categories = isset($_POST["show_categories"]);
    $show_latest     = isset($_POST["show_latest"]);    

    $category_ids = array();
    
    /*handle images*/
    if($_FILES["banner_homepage_bg"]["error"] === 0)
        save_image($_FILES["banner_homepage_bg"], "../../img/banner/index.jpg");
    elseif($_FILES["banner_homepage_bg"]["error"] !== 4) {
        header("Location: ../../cms/homepage");
        die("Error: Validation failed");
    }

    if($_FILES["logo_image"]["error"] === 0)
        save_image($_FILES["logo_image"], "../../img/branding/custom_logo.jpg");
    elseif($_FILES["logo_image"]["error"] !== 4) {
        header("Location: ../../cms/homepage");
        die("Error: Validation failed");
    }

    if($_FILES["favicon_image"]["error"] === 0)
        save_image($_FILES["favicon_image"], "../../img/branding/custom_favicon.jpg");
    elseif($_FILES["favicon_image"]["error"] !== 4) {
        header("Location: ../../cms/homepage");
        die("Error: Validation failed");
    }



    /*Perform Queries*/

    if($title !== "") {
        update_query("main_pages", "title", $title, "page_name", "home");
    }
    if($caption !== "") {
        update_query("main_pages", "caption", $caption, "page_name", "home");
    }
    


    update_query("homepage", "show", $show_popular, "section", "popular");
    update_query("homepage", "show", $show_categories, "section", "categories");
    update_query("homepage", "show", $show_latest, "section", "latest");
    


    //get all the category ids to be set 
    foreach($_POST as $key => $value) {
        if(preg_match("/show_category_/",$key)){
            array_push($category_ids, substr($key, 14));
        }
    }

    //reset all categories to 0
    update_all_query("categories", "show_on_homepage", 0);

    //set only the ones to show
    if(!empty($category_ids)) {
        update_multiple_query("categories", "show_on_homepage", 1, "id", $category_ids);
    }


    /*if Errors*/
    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/homepage");
        die("Error: Validation failed");
    }
    else {
        array_push($messages, "Changes saved.");
        $_SESSION["messages"] = $messages;
        header("Location: ../../cms/homepage");
    }
}
else {
    header("Location: ../../cms/homepage");
    die("Error: Bad Request");
}
?>