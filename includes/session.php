<?php
session_start();

function validation_errors() {
    $result = '';
    if(isset($_SESSION['errors'])){
        $result = '<div class="section" onclick="dismiss(this)">';
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
        $result = '<div class="section" onclick="dismiss(this)">';
        foreach ($_SESSION["messages"] as $message) {
            $result .= '<p style="color:#f30;font-size:0.8em;"><b>&#10004;</b> ' . $message . '</p>';
        }
        $result .= '</div>';
        unset($_SESSION["messages"]);
        return $result;
    }
}
?>
<script>
    function dismiss(element) {
        element.style.display = "none";
    }
</script>