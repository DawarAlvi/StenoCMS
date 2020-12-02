<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/view_authors");
require_once("../../includes/db_connect.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);
    if(mysqli_query($connection, "DELETE FROM `authors` WHERE `id` = {$id}")) {
        if(file_exists("../../img/authors/{$id}.jpg")) {
            unlink("../../img/authors/{$id}.jpg");
        }

        array_push($messages, "Author deleted successfully.");
        $_SESSION['messages'] = $messages;
    }
    else {
        array_push($errors, "Failed to delete author.");
        $_SESSION['errors'] = $errors;
    }

    
}
header("Location: ../../cms/view_authors");
?>