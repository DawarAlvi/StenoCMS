<?php
	require_once("../includes/session.php");
	auth_user("author", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info = get_banner_info("categories");
	$title 		 = $banner_info["title"];
	$caption 	 = $banner_info["caption"];

	$categories  = get_categories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Steno | CMS</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="../css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../css/light.min.css" type="text/css">
    <link rel="stylesheet" href="../css/custom/cms/base.php" type="text/css">

    <!--FAVICONS-->
    <?php file_exists("../img/branding/custom_favicon.jpg")?print('<link rel="icon" type="image/x-icon" href="../img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="../img/branding/default_favicon.png">'); ?>
</head>
<body>
	<?php
		$nav_current = "categories";
		require_once("../includes/cms/nav.php");
	?>

    <div class="main">
		<?php echo validation_errors() ?>
		<?php echo messages() ?>
        <form method="post" action="../action/cms/categories_submit.php" enctype="multipart/form-data">
		
		<?php if($_SESSION['is_admin']) { ?>
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Categories Background</label> <input type="file" name="banner_categories_bg" id="bcp_bg">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bcp_bg').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('bannercategories')">Default</button>
				</span>
				<label>Banner Categories Title</label> <input type="text" name="banner_categories_title" value="<?php echo($title) ?>">
				<label>Banner Categories Caption</label> <input type="text" name="banner_categories_caption" value="<?php echo($caption) ?>">
			</div>
		<?php } ?>
		
			<div class="section">
				<h2>Categories <button type="button" class="btn btn-confirm" title="Create new category" onclick="showAddCategoryModal();"><span class="fal fa-plus"></span></button></h2>
				<?php 
					while ($category = mysqli_fetch_assoc($categories)) {
						$entry = '<span>' . ucwords($category['name']) . '</span>';
						$entry .= '<button type="button" class="btn btn-confirm" onclick="showEditCategoryModal(' . $category['id'] . ',\'' . $category['name'] . '\');" title="Edit category">Edit</button>';
						$entry .= '<button type="button" class="btn" onclick="ajaxDeleteCategory(' . $category['id'] . ',\'' . $category['name'] . '\');" title="Delete category"><span class="fal fa-times"></span></button>';

						echo($entry);
					}
				?>
			</div>
			
			<?php
			if($_SESSION['is_admin']) {
				echo('
					<div class="section-last">
						<button type="button" class="btn btn-cancel" onclick="window.location.reload()" title="Discard Changes">Cancel</button>
						<input type="submit" value="Save" class="btn btn-confirm"title="Save Changes">
					</div>
				');
			}
			?>
		</form>
    </div>
	<!-- Main End -->


	<!-- Modals -->
	<!-- Add Category -->
	<div class="modal" id="addCategoryModal" onclick="this.style.display='none';">
		<form action="../action/cms/add_category_submit.php" method="post" enctype="multipart/form-data" onclick="event.stopPropagation();">
			<h1>Create new category</h1>
			<label for="addCategoryName">Category Name</label>
			<input type="text" name="category_name" id="addCategoryName" required>
			<br>
			<label for="addCategoryImage">Category Image</label>
			<input type="file" name="category_image" id="addCategoryImage" required>
			<br>
			<button type="button"class="btn btn-cancel" onclick="this.parentNode.parentNode.style.display='none';">Cancel</button>
			<input type="submit" value="Create" class="btn btn-confirm">
		</form>
	</div>

	<!-- Edit Category -->
	<div class="modal" id="editCategoryModal" onclick="this.style.display='none';">
		<form action="../action/cms/edit_category_submit.php" method="post" enctype="multipart/form-data" onclick="event.stopPropagation();">
			<h1>Edit category</h1>
			<input type="text" name="category_id" id="editCategoryId" hidden required>
			<label for="editCategoryName">Category Name</label>
			<input type="text" name="category_name" id="editCategoryName" required>
			<br>
			<label for="editCategoryImage">Category Image</label>
			<input type="file" name="category_image" id="editCategoryImage">
			<br>
			<button type="button"class="btn btn-cancel" onclick="this.parentNode.parentNode.style.display='none';">Cancel</button>
			<input type="submit" value="Save" class="btn btn-confirm">
		</form>
	</div>


	<script src="../js/custom.js"></script>
	<script>
		function showAddCategoryModal() {
			document.getElementById('addCategoryModal').style.display='flex';
			document.getElementById('addCategoryName').focus();
		}

		function showEditCategoryModal(categoryId, categoryName) {
			document.getElementById('editCategoryId').value = categoryId;
			document.getElementById('editCategoryName').value = categoryName;
			document.getElementById('editCategoryModal').style.display = 'flex';
			document.getElementById('editCategoryName').focus();
		}

		function ajaxDeleteCategory(categoryId, categoryName) {
			if(confirm("Delete " + categoryName + "?")) {
				xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange=function() {
					if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						if (history.scrollRestoration) {
							history.scrollRestoration = 'manual';
						} else {
							window.onbeforeunload = function () {
								window.scrollTo(0, 0);
							}
						}
						location.reload();
					}
				}

				xmlhttp.open('GET', '../action/cms/ajax_delete_category.php?id=' + categoryId, true);
				xmlhttp.send();
			}
		}
	</script>
</body>
</html>