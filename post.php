<?php
    if(!isset($_GET['q'])) {
        header("Location: index");
        die();
    }

    require_once("includes/db_connect.php");
    require_once("includes/functions.php");

    $post_id = sanitize_input($_GET['q']);
    $post = get_post_by_id($post_id);

    if(is_null($post)) {
        header("Location: index");
        die();
    }

    $post_title = $post['title'];
    $date = $post['date'];
    $format = str_split($post['format']);
    $author_id = $post['author_id'];
    
    $author = get_author_by_id($author_id);
    $author_name = $author['name'];

    $d = new DateTime($date);

    $categories = get_post_categories($post_id);
    $headings = get_post_headings($post_id);
    $texts = get_post_texts($post_id);
    

    // for tab title
    $banner_info = get_banner_info("home");
    $title = $banner_info["title"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php echo($title) ?></title>

    <!-- STYLES -->
    <link rel="stylesheet" href="css/all.min.css" type="text/css">
    <link rel="stylesheet" href="css/light.min.css" type="text/css">
    <link rel="stylesheet" href="css/custom/post.php?q=<?php print($post_id) ?>" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">
</head>

<body>
    <?php require_once("includes/nav.php"); ?>

    <div class="img-main"></div>
    <h1 class="title"><?php echo($post_title) ?></h1>
    
	<div class="wrapper">
		<p class="author-name"><?php echo($author_name) ?></p>
		<p class="date"><?php echo $d->format('d M Y'); ?></p>

        <?php
            $heading_index = 0;
            $text_index = 0;
            $image_index = 1;
            foreach ($format as $key => $value) {
                if($key > 0){
                    switch ($value) {
                        case 'h':
                            echo('<h2 class="heading">');
                            echo($headings[$heading_index]);
                            echo('</h2>');
                            $heading_index++;
                            break;
                        case 't':
                            echo('<p class="content">');
                            echo($texts[$text_index]);
                            echo('</p>');
                            $text_index++;
                            break;
                        case 'i':
                            echo('<img src="img/posts/'. $post_id .'/'. $image_index .'.jpg" class="content">');
                            $image_index++;
                            break;
                    }
                }
            }
        ?>
	</div>

    <?php require_once("includes/footer.php"); ?>

</body>

</html>
