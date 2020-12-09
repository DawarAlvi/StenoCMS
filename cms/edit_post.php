<?php 
    require_once("../includes/session.php");
    auth_user("author", ".");
    require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");

    if(isset($_GET['q']) && is_numeric($_GET['q'])) {

        $id = $_GET['q'];
        $post = mysqli_query($connection, "SELECT * FROM `posts` WHERE `id` = {$id}");
        if($post) {
            $post = mysqli_fetch_assoc($post);
            $title = $post['title'];
            $format = $post['format'];

            $categories = mysqli_query($connection, "SELECT `categories`.`id`, `categories`.`name`, `post_categories`.`post_id` FROM `categories` LEFT JOIN `post_categories` ON `categories`.`id`=`post_categories`.`category_id` WHERE `post_categories`.`post_id`={$id} OR `post_categories`.`post_id` IS NULL ORDER BY `categories`.`id` ASC");
            $post_categories = array();
            while($category = mysqli_fetch_assoc($categories)) {
                //find and save id's of categories with non null post_id
                if($category['post_id'] !== NULL) {
                    array_push($post_categories,$category['id']);
                }
            }
            mysqli_data_seek($categories,0); //Reset the result pointer
            
            $headings = mysqli_query($connection, "SELECT * FROM `post_headings` WHERE `post_id` = {$id}");
            $texts = mysqli_query($connection, "SELECT * FROM `post_texts` WHERE `post_id` = {$id}");
        }
        
	}
	else {
		header('Location: view_posts');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Steno | CMS</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="../css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../css/light.min.css" type="text/css">

    <link rel="stylesheet" href="../css/custom/cms/base.php" type="text/css">

    <!--FAVICONS-->
    <?php file_exists("../img/branding/custom_favicon.jpg")?print('<link rel="icon" type="image/x-icon" href="../img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="../img/branding/default_favicon.png">'); ?>

    <!-- SCRIPTS -->
	<script src="../js/ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php $nav_current = "view_posts"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <?php echo validation_errors(); ?>
        <form method="post" id="post_form" action="../action/cms/edit_post_submit.php?id=<?php echo($id) ?>" enctype="multipart/form-data">

            <div class="section" id="categories">
                <div>
                    <label for="categories">Categories:</label>
                    <button type="button" class="btn btn-confirm" title="Add post to a category" onclick="add_category();"><span class="fal fa-plus"></span></button>
                    <button type="button" class="btn btn-cancel" title="Remove last category" onclick="remove_category();"><span class="fal fa-minus"></span></button>
                </div>
            </div>

            <div class="section">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Enter title" value="<?php echo($title) ?>">
            </div>
            <div class="section">
                <label>Image:</label> <input type="file" name="image">
            </div>
            
            <div class="section-last">
                <button type="button" class="btn btn-cancel" onclick="window.location='view_posts'" title="Discard changes">Cancel</button>
                <input type="submit" class="btn btn-publish" value="Save">
            </div>
        </form>
    </div>

    <script>
        let no_of_categories = 0;

        init_categories();

        function add_category() {
            let elementParent = document.getElementById("categories");
            let element = document.createElement('select');
            element.setAttribute("required", "true");

            let firstElementChild = document.createElement("option");
            firstElementChild.innerText = "--Select category--";
            firstElementChild.setAttribute("disabled", "true");
            firstElementChild.setAttribute("selected", "true");
            element.appendChild(firstElementChild);

            <?php
                $result = get_categories();
                while ($row = mysqli_fetch_assoc($result)) {
                    echo('
                    let elementChild' . $row['id'] . ' = document.createElement("option"); 
                    elementChild' . $row['id'] . '.innerText = "' . $row['name'] . '"; 
                    elementChild' . $row['id'] . '.value = "' . $row['id'] . '"; 
                    element.appendChild(elementChild' . $row['id'] . ');
                    ');
                }
            ?>
            no_of_categories++;
            element.name = "category_" + no_of_categories;
            elementParent.appendChild(element);
        }

        function remove_category() {
            let elementParent = document.getElementById("categories");
            let toRemove = elementParent.lastElementChild;

            if (toRemove.type === "select-one") {
                elementParent.removeChild(toRemove);
                no_of_categories--;
            }

        }

        function init_categories() {
            // send data from php $post_categories var to js postCategories var
            let postCategories = new Array();
            <?php
                foreach ($post_categories as $id) {
                    ?> postCategories.push(<?php echo($id) ?>); <?php
                }
            ?>

            //add the categories drop down with appropriate category as selected by default
            postCategories.forEach((currentId)=>{
                let elementParent = document.getElementById("categories");
                let element = document.createElement('select');
                element.setAttribute("required", "true");

                let firstElementChild = document.createElement("option");
                firstElementChild.innerText = "--Select category--";
                firstElementChild.setAttribute("disabled", "true");
                element.appendChild(firstElementChild);

                <?php
                    $result = get_categories();
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo('
                        let elementChild' . $row['id'] . ' = document.createElement("option"); 
                        elementChild' . $row['id'] . '.innerText = "' . $row['name'] . '"; 
                        elementChild' . $row['id'] . '.value = "' . $row['id'] . '"; 
                        if(' . $row['id'] . ' === currentId) {
                            elementChild' . $row['id'] . '.setAttribute("selected", "true");
                        }
                        element.appendChild(elementChild' . $row['id'] . ');
                        ');
                    }
                ?>
                no_of_categories++;
                element.name = "category_" + no_of_categories;
                elementParent.appendChild(element);
            });
        }

    </script>
</body>
</html>