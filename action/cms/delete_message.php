<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/contact");
require_once("../../includes/db_connect.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = trim($_GET['id']);
    mysqli_query($connection, "DELETE FROM `messages` WHERE `id` = {$id}");

    array_push($messages, "Message deleted successfully.");
    $_SESSION['messages'] = $messages;
}
header("Location: ../../cms/contact");
?>