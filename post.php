<?php
    if(!isset($_GET['q'])) {
        header("Location: index");
        die;
    }

    require_once("includes/db_connect.php");
    require_once("includes/functions.php");

    $post_id = sanitize_input($_GET['q']);
    $post = get_post_by_id($post_id);

    if(is_null($post)) {
        header("Location: index");
        die;
    }

    increment_post_view($post_id);

    $post_title = $post['title'];
    $date = get_date($post['date']);
    
    $format = str_split($post['format']);
    $author_id = $post['author_id'];
    
    $author = get_author_by_id($author_id);
    $author_name = $author['name'];
    $author_email = $author['email'];
    $author_about = $author['about'];

    $categories = get_post_categories($post_id);
    $headings = get_post_headings($post_id);
    $texts = get_post_texts($post_id);

    $more_posts = get_posts_by_author($author_id);
    

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
    <link rel="stylesheet" href="css/custom/post.php" type="text/css">

    <!--FAVICONS-->
    <?php file_exists("img/branding/custom_favicon.jpg")?print('<link rel="icon" type="image/x-icon" href="img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="img/branding/default_favicon.png">'); ?>
</head>

<body>
    <?php require_once("includes/nav.php"); ?>
    
    <div id="banner" style="background: url('img/posts/<?php print($post_id) ?>/0.jpg') center center no-repeat; background-size: cover;">
        <div id="banner-strip">
            <span id="banner-title"><?php print($post_title) ?></span>
            <span id="banner-author">
                <img id="banner-author-pic" src="<?php file_exists('img/authors/'. $author_id .'.jpg')?print('img/authors/'. $author_id .'.jpg'):print('img/authors/default.png') ?>" width="50">
                <span id="banner-author-name"><?php print($author_name) ?></span>
                <span id="banner-date"><?php echo($date) ?></span>
            </span>
        </div>
    </div>

    
	<div class="wrapper">
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
                            echo('<img src="img/posts/'. $post_id .'/'. $image_index .'.jpg" class="content-img">');
                            $image_index++;
                            break;
                    }
                }
            }
        ?>
	</div>

    <div id="about-author">
        <img id="about-author-pic" src="<?php file_exists('img/authors/'. $author_id .'.jpg')?print('img/authors/'. $author_id .'.jpg'):print('img/authors/default.png') ?>" width="80">
        <div id="about-author-info">
            <span id="name"><?php print($author_name) ?></span>
            <a href="mailto:<?php print($author_email) ?>" id="email"><?php print($author_email) ?></a>
        </div>
        <div id="about-author-bio"><?php print($author_about) ?></div>
    </div>

    <?php if($more_posts->num_rows > 0) { ?>
    <div class="more">

            <h2>More by <?php echo($author_name) ?></h2>

            <div class="posts">

                <?php while($more_post = mysqli_fetch_assoc($more_posts)) {
                    $date = get_date($more_post["date"]);
                    $post_categories = get_post_categories($more_post["id"]);
                    ?>
                    <div class="post">
                        <img src="img/posts/<?php echo($more_post["id"]) ?>/0.jpg" width="300" height="200">
                    
                        <a class="link" href="post?q=<?php echo($more_post["id"]) ?>">
                            <div class="postbanner">
                                <div class="title"><?php echo($more_post["title"]) ?></div>
                                <div class="tags">
                                <?php foreach($post_categories as $category) { ?>
                                    <span><?php echo($category) ?></span>
                                <?php } ?>
                                </div>
                                <div class="date"><?php echo($date) ?></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>

    </div>
    <?php } ?>

    <?php require_once("includes/footer.php"); ?>

</body>

</html>
