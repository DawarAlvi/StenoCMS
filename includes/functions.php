<?php

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

	function is_current($value) {
		global $nav_current;
		if($nav_current === $value) print("current");
    }
    
    function confirm_query($result_set) {
        if(!$result_set)
            die("Database query failed.");
    }

    function get_banner_info($page_name) {
        global $connection;
        $query = "SELECT `title`, `caption` FROM `main_pages` WHERE `page_name` = '{$page_name}'"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return mysqli_fetch_assoc($result);
    }

    function get_pages_nav_info() {
        global $connection;
        $query = "SELECT `show_on_nav` FROM `main_pages` WHERE 1"; 
        $result = mysqli_query($connection, $query);
        confirm_query($result);
        return $result;
    }

    function get_categories_nav_info() {
        global $connection;
        $query = "SELECT `id`, `name`, `show_on_navbar` FROM `categories` WHERE 1"; 
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

    function get_categories($limit=0, $homepage=false) {
        global $connection;
        $query = "SELECT * FROM `categories`";
        $query .= $homepage ? " WHERE `show_on_homepage` = 0" : "";
        $query .= $limit > 0 ? " LIMIT " . $limit : ""; 

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

    function get_posts_by_category($category_id) {
        global $connection;
        $query = "SELECT `posts`.`id`,`posts`.`title`,`posts`.`author_id` , `posts`.`date`, `posts`.`format`, `posts`.`views`, `posts`.`online` FROM `posts` JOIN `post_categories` ON `posts`.`id` = `post_categories`.`post_id` WHERE `category_id` = " . $category_id;
        $result = mysqli_query($connection, $query);
        
        return $result;
    }

    function sanitize_input($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

?>