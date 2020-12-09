<?php
    require_once('../../includes/session.php');
    auth_user('admin', '../../');
    require_once('../../includes/db_connect.php');
    require_once('../../includes/functions.php');

    $success = 'Post deleted.';
    $failure = 'Deletion unsuccessful.';

    if(isset($_GET['id'])) {
        $id = sanitize_input($_GET['id']);
        $result = mysqli_query($connection, "DELETE FROM `posts` WHERE `id` = {$id}");
        if($result) {
            mysqli_query($connection, "DELETE FROM `post_categories` WHERE `post_id` = {$id}");
            mysqli_query($connection, "DELETE FROM `post_headings` WHERE `post_id` = {$id}");
            mysqli_query($connection, "DELETE FROM `post_texts` WHERE `post_id` = {$id}");
        
            delete_directory("../../img/posts/{$id}");
            array_push($messages, $success);
        }
        else {
            array_push($errors, $failure);
        }
        

        if(!empty($messages))
            $_SESSION['messages'] = $messages;
        if(!empty($errors))
            $_SESSION['errors'] = $errors;
    }

    function delete_directory($dirname) {
        if (is_dir($dirname))
          $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
                else
                    delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
?>