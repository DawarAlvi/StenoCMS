<?php include_once("../includes/session.php"); ?>
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

</head>

<body>
    <?php require_once("../includes/functions.php"); ?>
    <?php $nav_current = "create_post"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form method="post" id="post_form" action="../action/create_post_submit.php" enctype="multipart/form-data">
            <?php echo validation_errors();?>

            <input type="text" name="format" value="" id="format_field" hidden>

            <div class="section">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" placeholder="enter title of the blog post">
            </div>
            
            <div class="section-last">
                <button type="button" class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
                <input type="submit" class="btn btn-publish" name="submit" value="Publish">
            
                <div class="controls">
                    <button type="button" class="btn btn-confirm" onclick="add_item('text')">   <span class="fal fa-plus"> </span> Text   </button>
                    <button type="button" class="btn btn-confirm" onclick="add_item('heading')"><span class="fal fa-plus"> </span> Heading</button>
                    <button type="button" class="btn btn-confirm" onclick="add_item('image')">  <span class="fal fa-plus"> </span> Image  </button>
                    <button type="button" class="btn btn-cancel"  onclick="remove_item()">      <span class="fal fa-minus"></span> Item   </button>
                </div>
            <div>
        </form>
    </div>
    
    <script>
        var no_of_headings = 0;
        var no_of_images = 0;
        var no_of_texts = 0;

        var format = '';
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
                    sectionDiv.innerHTML = '<label>Text:</label> <input type="text" placeholder="Enter Text" name="text_' + no_of_texts + '">';
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
            update_format_value();
        }

        function remove_item() {
            let postForm = document.getElementById('post_form');

            //don't let four elements: format(invisible), title, first image and control buttons be deleted
            if (postForm.children.length > 4) {
                //get the second to last div element
                let toRemove = postForm.lastElementChild.previousElementSibling;
                switch (toRemove.lastElementChild.type) {
                    case "textarea":
                        --no_of_texts;
                        break;
                    case "text":
                        --no_of_headings;
                        break;
                    case "file":
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
            var format_field = document.getElementById("format_field");
            format_field.value = format;
        }
    </script>

</body>
</html>