<?php
    require_once("includes/session.php");

    $_SESSION["author_id"]= null;
    $_SESSION["author_name"]= null;
    $_SESSION["is_admin"]= null;

    if(isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
    
    session_destroy();

    header("Location: login.php");
?>