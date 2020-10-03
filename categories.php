<?php require_once("includes/db_connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
    $banner_info = get_banner_info("categories");
    $title = $banner_info["title"];
    $caption = $banner_info["caption"];

    $categories = get_categories();
    $popular_posts = get_popular();
    $latest_posts = get_latest();
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
    <link rel="stylesheet" href="css/custom/categories.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="img/steno_logo.png">
</head>

<body>
    <?php require_once("includes/nav.php"); ?>
    <?php echo (get_banner($title, $caption)); ?>
    <?php
        if(isset($_GET['q'])) {
            //show posts from specified category
            if(is_numeric($_GET['q'])) {
                $post_ids = mysqli_query($connection, "SELECT `post_id` FROM `post_categories` WHERE `category_id` = " . $_GET['q']);
                
                while($post_id = mysqli_fetch_row($post_ids)) {
                    echo("<pre>");var_dump($post_id);echo("</pre>");
                }
            }
            //show all posts by popularity
            elseif ($_GET['q'] === 'popular') {

                echo('<div class="popularposts">');

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
                echo('</div>');
            }
            //show all posts by recency
            elseif ($_GET['q'] === 'latest') {
                echo('<div class="latestposts">');

                while($latest_post = mysqli_fetch_assoc($latest_posts)) {
                    $date = new DateTime($latest_post["date"]);
                    $date = $date -> format("d M Y");
                    $post_categories = get_post_categories($latest_post["id"]);
    
                    echo('
                        <a class="post" href="post?q=' . $latest_post["id"] . '">
                            <div class="postbg postbg-' . $latest_post["id"] . '">
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
                }
                echo('</div>');
            }
            
        }
        //show all categories
        else {
            echo('<div class="categories">');
            while($category = mysqli_fetch_assoc($categories)) {
                echo('
                <a href="categories.php?q=' . $category["id"] . '" class="category category-' . $category["id"] . '" title="' . $category["name"] . '">
                    <span>' . $category["name"] . '</span>
                </a>');
            }
        }
    ?>
    </div>


    <?php require_once("includes/footer.php"); ?>

</body>

</html>