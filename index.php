<?php require_once("includes/db_connect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
    $banner_info = get_banner_info("home");
    $title = $banner_info["title"];
    $caption = $banner_info["caption"];

    $homepage_info = get_homepage_info();
    $show_popular = mysqli_fetch_assoc($homepage_info)["show"];
    $show_categories = mysqli_fetch_assoc($homepage_info)["show"];
    $show_latest = mysqli_fetch_assoc($homepage_info)["show"];

    $popular_posts = get_popular(3);
    $categories = get_categories(4,true);
    $latest_posts = get_latest(4);
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
    <link rel="stylesheet" href="css/custom/index.php" type="text/css">

    <!--FAVICONS-->
    <?php file_exists("img/branding/custom_favicon.jpg")?print('<link rel="icon" type="image/x-icon" href="img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="img/branding/default_favicon.png">'); ?>
    
</head>

<body>
    <?php require_once("includes/nav.php"); ?>
    <?php echo (get_banner($title, $caption)); ?>

    <!-- Popular posts -->
    <?php 
        if($show_popular){
            echo('
            <h1><a href="categories?q=popular">Popular <span class="fal fa-angle-right"></span></a></h1>

            <div class="popularposts">
            ');
        
            while($popular_post = mysqli_fetch_assoc($popular_posts)) {
                $date = new DateTime($popular_post["date"]);
                $date = $date -> format("d M Y");
                $post_categories = get_post_categories($popular_post["id"]);

                echo('
                    <a class="post" href="post?q=' . $popular_post["id"] . '">
                        <div class="postbg postbg-' . $popular_post["id"] . '">
                            <div class="postbanner">
                                <div class="title">' . $popular_post["title"] . '</div>
                                <div class="tags">
                                '); 
                                foreach($post_categories as $category) {
                                    echo('
                                    <span href="categoies/?q=' . 
                                    $category . 
                                    '">'. $category . 
                                    '</span>'
                                );
                                }
                                echo('
                                </div>
                                <div class="date">' . $date . '</div>
                            </div>
                        </div>
                    </a>
                ');
            }
            echo('</div> <!-- popularposts End -->');
        }
    ?>

    <!-- Categories -->
    <?php
        if($show_categories) {
            echo('<h1><a href="categories">Categories <span class="fal fa-angle-right"></span></a></h1>
            <div class="categories">
            ');

            while($category = mysqli_fetch_assoc($categories)) {
                echo('
                <a href="categories?q=' . $category["id"] . '" class="category category-' . $category["id"] . '">
                    <span>' . $category["name"] . '</span>
                </a>
                ');
            }
            echo('</div><!-- Categories End -->');
        }
    ?>

    <!-- Latest posts -->
    <?php
        if($show_latest) {
            echo('<h1><a href="categories?q=latest">Latest <span class="fal fa-angle-right"></span></a></h1>
            <div class="latestposts">
            ');
            
            $post_no = 1;
            while($latest_post = mysqli_fetch_assoc($latest_posts)) {
                $date = new DateTime($latest_post["date"]);
                $date = $date -> format("d M Y");
                $post_categories = get_post_categories($latest_post["id"]);
                echo('
                <a class="post postbg-' . $latest_post["id"] . ' post-' . $post_no . '" href=post?q=' . $latest_post["id"] . '>
                    <div class="postbg">
                        <div class="postbanner">
                            <div class="title">' . $latest_post["title"] . '</div>
                            <div class="tags">
                            '); 
                            foreach($post_categories as $category) {
                                echo('
                                <span href="categoies/?q=' . 
                                $category . 
                                '">'. $category . 
                                '</span>'
                            );
                            }
                            echo('
                            </div>
                            <div class="date">' . $date . '</div>
                        </div>
                    </div>
                </a>
                ');

                $post_no++;
            }
            echo('</div><!-- Latest End-->');
        }
    ?>

    <?php require_once("includes/footer.php"); ?>
</body>
</html>
