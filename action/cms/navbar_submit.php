<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/homepage");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $category_ids = array();
    
    /*Perform Queries*/
    /*Main Pages*/ 
    $pages 	= get_main_pages_nav_info();

    while($page = mysqli_fetch_assoc($pages)) {
        $value = 0;
        if(isset($_POST[$page['page_name']]))
            $value = 1;
        update_query("main_pages", "show_on_nav", $value , "page_name", $page['page_name']);
    }

    /*Categories*/
    //get all the category ids to be set 
    foreach($_POST as $key => $value) {
        if(preg_match("/show_category_/",$key)){
            array_push($category_ids, substr($key, 14));
        }
    }

    //reset all categories to 0
    update_all_query("categories", "show_on_navbar", 0);

    //set only the ones to show
    if(!empty($category_ids)) {
        update_multiple_query("categories", "show_on_navbar", 1, "id", $category_ids);
    }



    
    /*if Errors*/
    if(!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("Location: ../../cms/navbar");
        die("Error: Validation failed");
    }
    else {
        array_push($messages, "Changes saved.");
        $_SESSION["messages"] = $messages;
        header("Location: ../../cms/navbar");
        die;
    }
}
else {
    header("Location: ../../cms/navbar");
    die("Error: Bad Request");
}
?>