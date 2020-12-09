<?php
require_once("../../includes/session.php");
auth_user("author", "../../cms/homepage");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = sanitize_input($_POST['title']);
    $image = $_FILES['image'];
    $categories = array();

    foreach($_POST as $key => $value){
        if(preg_match("/category_/",$key)){
            array_push($categories,$value);
        }
    }




    // title
    if($title !== "") {
        update_query("posts", "title", $title, "id", $id);
    }


    // categories
    mysqli_query($connection, "DELETE FROM `post_categories` WHERE `post_id`={$id}");
    foreach ($categories as $category_id) {
        $query = "INSERT INTO `post_categories` ";
        $query .= "(`post_id`, `category_id`) ";
        $query .= "VALUES ('{$id}', '{$category_id}')";

        $result = mysqli_query($connection, $query);
    }

    // image
    if($image['error'] === 0) {
        move_uploaded_file($image["tmp_name"], "../../img/posts/{$id}/0.jpg");
    }
    elseif ($image['error'] !== 4) {
        array_push($errors, "Invalid image.");
    }



    if(empty($errors)) {
        array_push($messages, "Changes saved.");
        $_SESSION['messages'] = $messages;
        header("Location: ../../cms/view_posts");
    }
    else {
        $_SESSION['errors'] = $errors;
        header("Location: ../../cms/view_posts");
    }
}
else {
    header("Location: ../../cms/view_posts");
    die("Bad Request");
}
?>