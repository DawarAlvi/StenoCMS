<?php 
    require_once("../includes/session.php");
    user_auth("author", ".");
    require_once("../includes/db_connect.php");
    require_once("../includes/functions.php");
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
    <link rel="icon" type="image/x-icon" href="../img/steno_logo.png">

    <!-- SCRIPTS -->
	<script src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php $nav_current = "create_post"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <?php echo validation_errors();?>
        <form method="post" id="post_form" action="../action/cms/create_post_submit.php" enctype="multipart/form-data">

            <input type="text" name="format" value="" id="format_field" hidden>

            <div class="section" id="categories">
                <div>
                    <label for="categories">Categories:</label>
                    <button type="button" class="btn btn-confirm" title="Add post to a category" onclick="add_category();"><span class="fal fa-plus"></span></button>
                    <button type="button" class="btn btn-cancel" title="Remove last category" onclick="remove_category();"><span class="fal fa-minus"></span></button>
                </div>
            </div>

            <div class="section">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="Enter title">
            </div>
            
            <div class="section-last">
                <button type="button" class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
                <input type="submit" class="btn btn-publish" value="Publish">
            
                <div class="controls">
                    <button type="button" class="btn btn-confirm" onclick="add_item('text')">   <span class="fal fa-plus"> </span> Text   </button>
                    <button type="button" class="btn btn-confirm" onclick="add_item('heading')"><span class="fal fa-plus"> </span> Heading</button>
                    <button type="button" class="btn btn-confirm" onclick="add_item('image')">  <span class="fal fa-plus"> </span> Image  </button>
                    <button type="button" class="btn btn-cancel"  onclick="remove_item()">      <span class="fal fa-minus"></span> Item   </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        let no_of_categories = 0;
        let no_of_headings = 0;
        let no_of_images = 0;
        let no_of_texts = 0;

        let format = '';
        //format string example: 'ihtht'
        //see: add_item(), remove_item()


        //default fields on load
        add_item('image');
        add_item('text');

        //set format value on load
        update_format_value();

        function add_item(item) {
            let postForm = document.getElementById('post_form');
            let lastElement = postForm.lastChild;
            let sectionDiv = document.createElement('div');

            sectionDiv.classList.add('section');

            switch (item) {
                case 'text':
                    no_of_texts++;
                    sectionDiv.innerHTML = '<label>Text:</label> <textarea name="text_' + no_of_texts + '"></textarea>';
                    format += 't';
                    break;
                case 'heading':
                    no_of_headings++;
                    sectionDiv.innerHTML = '<label>Heading:</label> <input type="text" placeholder="Enter Heading" name="heading_' + no_of_headings + '">';
                    format += 'h';
                    break;
                case 'image':
                    no_of_images++;
                    sectionDiv.innerHTML = '<label>Image:</label> <input type="file" name="image_' + no_of_images + '">';
                    format += 'i';
                    break;
                default:
                    return false;
            }
            postForm.insertBefore(sectionDiv, lastElement);

            //After adding the element if it is text then replace it with ckeditor
            if (item === 'text') CKEDITOR.replace("text_" + no_of_texts);

            update_format_value();
        }

        function remove_item() {
            let postForm = document.getElementById('post_form');

            //don't let five elements: format(invisible), categories, title, first image and control buttons be deleted
            if (postForm.children.length > 5) {
                //get the second to last div element
                let toRemove = postForm.lastElementChild;

                //check the toRemove element's label
                switch (toRemove.firstElementChild.innerHTML) {
                    case "Text:":
                        --no_of_texts;
                        break;
                    case "Heading:":
                        --no_of_headings;
                        break;
                    case "Image:":
                        --no_of_images;
                        break;
                    default:
                        return false;
                }
                postForm.removeChild(toRemove);

                //remove last char from format string
                format = format.substr(0, format.length - 1);
                update_format_value();
            }
        }

        function update_format_value() {
            let format_field = document.getElementById("format_field");
            format_field.value = format;
        }

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
    </script>
</body>
</html>