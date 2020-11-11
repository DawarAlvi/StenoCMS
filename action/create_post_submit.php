<?php
require_once("../includes/session.php");
require_once("../includes/db_connect.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    /*--Initialization--*/
    date_default_timezone_set('Asia/Kolkata');

    $date = date("Y-m-d");
    $format = $_POST["format"];
    $title = $_POST["title"];

    /***********************************/
    /*USE SESSION TO GET REAL AUTHOR ID*/
    $author_id = 1;
    /***********************************/

    $categories =
    $headings = 
    $texts = 
    $images = 
    $errors = array();

    $valid_imgs = array('jpg','jpeg','png');
    
    foreach($_POST as $key => $value){
        if(preg_match("/category_/",$key)){
            array_push($categories,$value);
            continue;
        }
        if(preg_match("/heading_/",$key)){
            array_push($headings,$value);
            continue;
        }
        if(preg_match("/text_/",$key)){
            array_push($texts,$value);
            continue;
        }
    }
    foreach($_FILES as $key => $value){
        if(preg_match("/image_/",$key)){
            array_push($images,$value);
            continue;
        }
    }





    /*--Validation--*/
    if($format === ""){
        array_push($errors,"Cannot publish with no content.");
    }
    if($title === ""){
        array_push($errors,"Title cannot be empty.");
    }
    if(count($texts) > 0){
        foreach($texts as $text){
            if($text === ""){
                array_push($errors,"Text field cannot be empty.");
                break;
            }
        }
    }
    if(count($headings) > 0){
        foreach($headings as $heading){
            if($heading === ""){
                array_push($errors,"Heading field cannot be empty.");
                break;
            }
        }
    }
    foreach($images as $key => $image){
        $file_name = $image["name"];
        $ext = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));

        //if image is empty or not of valid type
        if($image["size"] === 0 || !in_array($ext,$valid_imgs)){
            array_push($errors,"Empty or invalid image (only jpg and png allowed).");
            break;
        }
        if(($image["size"]/1024) > 2048) {
            array_push($errors,"Image cannot be more than 2Mb.");
            break;
        }
    }



    /*--Sanitization--*/
    // htmlentities
    // mysqli_real_escape_strings
    //urlencode

    
    


    /*--Queries--*/
    if(count($errors) === 0) {

        //post query
        $query = "INSERT INTO `posts` ";
        $query .= "(`title`, `author_id`, `date`, `format`) ";
        $query .= "VALUES ('{$title}', '{$author_id}', CURRENT_DATE(), '{$format}')";

        
        $result = mysqli_query($connection, $query);
        
        //if query failed
        if(!$result) {
            array_push($errors,"Database query failed.");
            $_SESSION["errors"] = $errors;
            header("Location: ../cms/create_post");
            die("Database query failed.");
        }
        else {
             $post_id = mysqli_insert_id($connection);
            
            //post_categories query
            foreach ($categories as $category_id) {
                $query = "INSERT INTO `post_categories` ";
                $query .= "(`post_id`, `category_id`) ";
                $query .= "VALUES ('{$post_id}', '{$category_id}')";

                $result = mysqli_query($connection, $query);

                if(!$result) {
                    array_push($errors,"Database query failed.");
                    $_SESSION["errors"] = $errors;
                    header("Location: ../cms/create_post");
                    die("Database query failed.");
                }
            }

            //post_headings query
            foreach ($headings as $heading) {
                $query = "INSERT INTO `post_headings` ";
                $query .= "(`content`, `post_id`) ";
                $query .= "VALUES ('{$heading}','{$post_id}')";

                $result = mysqli_query($connection, $query);

                if(!$result) {
                    array_push($errors,"Database query failed.");
                    $_SESSION["errors"] = $errors;
                    header("Location: ../cms/create_post");
                    die("Database query failed.");
                }
            }

            //post_texts query
            foreach ($texts as $text) {
                $query = "INSERT INTO `post_texts` ";
                $query .= "(`content`, `post_id`) ";
                $query .= "VALUES ('{$text}','{$post_id}')";

                $result = mysqli_query($connection, $query);

                if(!$result) {
                    array_push($errors,"Database query failed.");
                    $_SESSION["errors"] = $errors;
                    header("Location: ../cms/create_post");
                    die("Database query failed.");
                }
            }

            //save images
            $destination = "../img/posts/" . $post_id;
            mkdir($destination);

            foreach ($images as $key => $image) {
                
                move_uploaded_file($image["tmp_name"],$destination . "/" . $key . ".jpg");
            }

            header("Location: ../cms/view_posts");
        }
    }
    else {
        //validation failed
        $_SESSION["errors"] = $errors;
        header("Location: ../cms/create_post.php");
    }
}
else {
    header("Location: ../cms/create_post.php");
    die("Bad Request");
}
?>