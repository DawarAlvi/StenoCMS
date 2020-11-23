<?php
require_once("../../includes/session.php");
auth_user("author", "../../cms/categories");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = strtolower(sanitize_input($_POST["category_name"]));
    $id = sanitize_input($_POST["category_id"]);
    
    if($name !== '') {
        $result = update_query('categories','name', $name, 'id', $id);
        if($result) {
            array_push($messages, "Category name updated successfully.");
        }
        else {
            array_push($errors, "Category name update unsuccessful.");
        }
    }

    if($_FILES["category_image"]["error"] === 0) {
        if(save_image($_FILES["category_image"], "../../img/categories/{$id}.jpg"))
            array_push($messages, "Category image updated successfully.");
    }
    elseif($_FILES["category_image"]["error"] !== 4) {
        array_push($errors, "Invalid image.");
    }


    /* if errors or messages */
    if(!empty($errors)) {
        $_SESSION['errors'] = $errors;
    }
    if(!empty($messages)) {
        $_SESSION['messages'] = $messages;
    }

    header("Location: ../../cms/categories.php");
}
else {
    header("Location: ../../cms/categories");
    die;
}
?>