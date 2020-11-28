<?php
require_once("../../includes/session.php");
auth_user("admin", "../../cms/homepage");
require_once("../../includes/db_connect.php");
require_once("../../includes/functions.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $facebook  = sanitize_input($_POST["facebook"]);
    $instagram = sanitize_input($_POST["instagram"]);
    $twitter   = sanitize_input($_POST["twitter"]);

    if(!empty($facebook)) {
        mysqli_query($connection, "UPDATE `links` SET `url` = '{$facebook}' WHERE `name` = 'facebook'");
    }
    if(!empty($instagram)) {
        mysqli_query($connection, "UPDATE `links` SET `url` = '{$instagram}' WHERE `name` = 'instagram'");
    }
    if(!empty($twitter)) {
        mysqli_query($connection, "UPDATE `links` SET `url` = '{$twitter}' WHERE `name` = 'twitter'");
    }

    array_push($messages,"Media links updated successfully.");
    $_SESSION["messages"] = $messages;
    header("Location: ../../cms/links.php");
}
else {
    header("Location: ../../cms/homepage");
    die("Error: Bad Request");
}
?>