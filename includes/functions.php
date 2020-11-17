<?php
    function sanitize_input($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    function confirm_query($result_set) {
        if(!$result_set) {
            die("Database query failed.");
        }
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

    /* Banner functions */
    function get_banner($title,$caption) {
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

    function get_post_by_id($id) {
        global $connection;
        $query = "SELECT * from `posts` WHERE `id` = " . $id;
        $result = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function get_authors() {
        global $connection;
        $query = "SELECT * FROM `authors`";
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

?>