<?php
session_start();

function validation_errors(){
    $result = "";
    if(isset($_SESSION["errors"])){
        $result = "<div>";
        foreach ($_SESSION["errors"] as $error) {
            $result .= "<p style=\"color:#f30;font-size:0.8em;\"><b>&Cross;</b> " . $error . "</p>";
        }
        $result .= "</div>";
        unset($_SESSION["errors"]);
        return $result;
    }
}
?>