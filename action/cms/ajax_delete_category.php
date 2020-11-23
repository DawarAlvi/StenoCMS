<?php
    require_once('../../includes/session.php');
    auth_user('author', '../../');
    require_once('../../includes/db_connect.php');
    require_once('../../includes/functions.php');

    $success = 'Category deleted.';
    $faliure = 'Deletion unsuccessful.';

    if(isset($_GET['id'])) {
        $id = sanitize_input($_GET['id']);
        $result = mysqli_query($connection, "DELETE FROM `categories` WHERE `id` = {$id}");
        if($result) {
            $image = "../../img/categories/{$id}.jpg";
            if(file_exists($image)){
                unlink($image);
            }
            array_push($messages, $success);
        }
        else {
            array_push($errors, $faliure);
        }
        

        if(!empty($messages))
            $_SESSION['messages'] = $messages;
        if(!empty($errors))
            $_SESSION['errors'] = $errors;
    }
?>