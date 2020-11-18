<?php
session_start();

$errors = array();
$messages = array();

function auth_user($auth_level="normal", $redirect_to="/") {
    if(!isset($_SESSION['author_id'])) {
        header("Location: ../../login");
        die;
    }
    if($auth_level === "admin"){
        //Admin only page
        if(!$_SESSION['is_admin']) {
            header("Location: " . $redirect_to);
            die;
        }
    }
}

function validation_errors() {
    $result = '';
    if(isset($_SESSION['errors'])){
        $result = '<div class="section" onclick="this.style.display = \'none\';">';
        foreach ($_SESSION['errors'] as $error) {
            $result .= '<p style="color:#f30;font-size:0.8em;"><b>&#10006;</b> ' . $error . '</p>';
        }
        $result .= '</div>';
        unset($_SESSION['errors']);
        return $result;
    }
}

function messages() {
    $result = '';
    if(isset($_SESSION['messages'])){
        $result = '<div class="section" onclick="this.style.display = \'none\';">';
        foreach ($_SESSION["messages"] as $message) {
            $result .= '<p style="color:#f30;font-size:0.8em;"><b>&#10004;</b> ' . $message . '</p>';
        }
        $result .= '</div>';
        unset($_SESSION["messages"]);
        return $result;
    }
}
?>
