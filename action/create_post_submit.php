<?php require_once "../includes/session.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
    /*--Initialization--*/
    date_default_timezone_set('Asia/Kolkata');

    $date = date("Y-m-d");
    $format = $_POST["format"];
    $title = $_POST["title"];

    $texts = array();
    $headings = array();
    $images = array();
    $errors = array();

    $valid_imgs = array('jpg','jpeg','png');
    
    foreach($_POST as $key => $value){
        if(preg_match("/text_/",$key)){
            array_push($texts,$value);
            continue;
        }
        if(preg_match("/heading_/",$key)){
            array_push($headings,$value);
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
        $ext = pathinfo($file_name,PATHINFO_EXTENSION);

        //if image is empty or not of valid type
        if($image["size"] === 0 || !in_array($ext,$valid_imgs)){
            array_push($errors,"Empty or invalid image.");
            break;
        }
    }



    /*--Sanitization--*/
    // htmlentities
    // mysqli_real_escape_strings
    //urlencode

    
    


    /*--Queries--*/
    if(count($errors) === 0) {
        //validation successful, perform queries
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