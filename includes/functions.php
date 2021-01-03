<?php
    function get_date($d){
        return (new DateTime($d))->format("d M Y");
    }
    
    function count_folder($dir) {
        return (count(scandir($dir)) - 2);
    }

    function sanitize_input($input) {
		global $connection;
        return mysqli_real_escape_string($connection, stripslashes(trim($input)));
    }

    function confirm_query($result) {
        if(!$result) {
            die("Database query failed.");
        }
        else return $result;
    }

    function attempt_login($email, $password) {
        $author = get_author_by_email($email);
        if($author) {
            if(password_verify($password,$author['password'])) {
                return $author;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    function save_image($image, $destination) {
        global $errors;

        $valid_imgs = array('jpg','jpeg','png');

        $file_name = $image["name"];
        $ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

        //if image is empty or not of valid type
        if($image["size"] === 0 || !in_array($ext,$valid_imgs)){
            array_push($errors,"Empty or invalid image (only jpg and png allowed).");
            return false;
        }
        if(($image["size"]/1024) > 2048) {
            array_push($errors,"Image cannot be more than 2Mb.");
            return false;
        }

        move_uploaded_file($image["tmp_name"], $destination);
        return true;
    }

    


    /* Banner functions */
    function get_banner($title, $caption) {
        $banner = '
        <div class="banner">
            <div class="strip">            
                <a href="index" class="logo"></a>
                <p class="title">'.$title.'</p>
                <div class="caption">'.$caption.'</div>
            </div>
        </div>';
        return($banner);
    }

    function get_banner_info($page_name) {
        global $connection;
        $query = "SELECT `title`, `caption` FROM `main_pages` WHERE `page_name` = '{$page_name}'"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return mysqli_fetch_assoc($result);
    }






    function update_query($table, $attribute, $value, $key,$key_value) {
        global $connection;
        $query = "UPDATE `{$table}` SET `{$attribute}` = '{$value}' WHERE `{$key}` = '{$key_value}'";
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function update_multiple_query($table, $attribute, $value, $key, $key_values) {
        global $connection;

        $query = "UPDATE `{$table}` SET `{$attribute}` = '{$value}' WHERE `{$key}` IN (";
        foreach($key_values as $index => $key_value) {
            if($index > 0)$query .= ", ";
            $query .= $key_value;
        }
        $query .= ")";

        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }
    
    function update_all_query($table, $attribute, $value) {
        global $connection;
        $query = "UPDATE `{$table}` SET `{$attribute}` = '{$value}' WHERE 1";
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }




    function get_main_pages_nav_info() {
        global $connection;
        $query = "SELECT `page_name`, `show_on_nav` FROM `main_pages`"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_homepage_info() {
        global $connection;
        $query = "SELECT `section`, `show` FROM `homepage` WHERE 1"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_popular($limit=0) {
        global $connection;
        $query = "SELECT * FROM `posts` WHERE `online` = 1 ORDER BY `views` DESC";
        if($limit > 0) $query .= " LIMIT " . $limit; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_latest($limit=0) {
        global $connection;
        $query = "SELECT * FROM `posts` WHERE `online` = 1 ORDER BY `date` DESC";
        if($limit > 0) $query .= " LIMIT " . $limit; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_post_categories($post_id) {
        global $connection;
        $categories = Array();
        $query = "SELECT `category_id` FROM `post_categories` WHERE `post_id` = " . $post_id;
        $post_categories = mysqli_query($connection, $query);
        confirm_query($post_categories);
        
        while($post_category = mysqli_fetch_assoc($post_categories)) {
            $query = "SELECT `name` FROM `categories` WHERE `id` = " . $post_category["category_id"];
            $category = mysqli_query($connection, $query);
            confirm_query($category);
            array_push($categories,mysqli_fetch_row($category)[0]);
        }

        return $categories;
    }

    function get_post_headings($post_id) {
        global $connection;
        $headings = Array();
        $query = "SELECT `content` FROM `post_headings` WHERE `post_id` = " . $post_id;
        $post_headings = mysqli_query($connection, $query);
        confirm_query($post_headings);

        while($row = mysqli_fetch_assoc($post_headings)) {
            array_push($headings,$row['content']);
        }
        
        return $headings;
    }

    function get_post_texts($post_id) {
        global $connection;
        $texts = Array();
        $query = "SELECT `content` FROM `post_texts` WHERE `post_id` = " . $post_id;
        $post_texts = mysqli_query($connection, $query);
        confirm_query($post_texts);

        while($row = mysqli_fetch_assoc($post_texts)) {
            array_push($texts,$row['content']);
        }
        
        return $texts;
    }

    function get_posts_by_category($category_id) {
        global $connection;
        $query = "SELECT `posts`.`id`,`posts`.`title`,`posts`.`author_id` , `posts`.`date`, `posts`.`format`, `posts`.`views`, `posts`.`online` FROM `posts` JOIN `post_categories` ON `posts`.`id` = `post_categories`.`post_id` WHERE `category_id` = " . $category_id;
        $result = mysqli_query($connection, $query);
        
        return $result;
    }

    function get_posts_by_author($author_id) {
        global $connection;
        $query = "SELECT * FROM `posts` WHERE `author_id` = '{$author_id}'";
        $result = mysqli_query($connection, $query);
        return $result;
    }

    function get_post_by_id($id) {
        global $connection;
        $query = "SELECT * from `posts` WHERE `id` = " . $id;
        $result = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function get_authors() {
        global $connection;
        $query = "SELECT * FROM `authors` ORDER BY `name` ASC";
        $result = mysqli_query($connection, $query);
        return $result;
    }

    function get_author_by_id($id) {
        global $connection;
        $query = "SELECT * FROM `authors` WHERE `id` = " . $id;
        $result = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function get_author_by_email($email) {
        global $connection;
        $query = "SELECT * FROM `authors` WHERE `email` = '{$email}'";
        $result = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function get_categories($limit=0, $homepage=false) {
        global $connection;
        $query = "SELECT * FROM `categories`";
        $query .= $homepage ? " WHERE `show_on_homepage` = 0" : "";
        $query .= $limit > 0 ? " LIMIT " . $limit : ""; 

        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function increment_post_view($post_id) {
        global $connection;
        mysqli_query($connection, "UPDATE `posts` SET `views` = `views` + 1 WHERE id = '{$post_id}'");
    }

    function get_media_links() {
        global $connection;
        return mysqli_query($connection, "SELECT * FROM `links`");
    }

    function get_messages() {
        global $connection;
        return mysqli_query($connection, "SELECT * FROM `messages` ORDER BY `id` DESC");
    }

?>