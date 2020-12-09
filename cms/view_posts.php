<?php
	require_once("../includes/session.php");
	auth_user("author", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");
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
	</script>
</head>

<body>
	<?php 
		$nav_current = "view_posts";
		require_once("../includes/cms/nav.php");

		$posts = get_latest();
	?>

    <div class="main">
		<?php echo validation_errors(); ?>
		<?php echo messages(); ?>
		<div class="section">
			<h2>All Posts</h2>
			<?php while($post = mysqli_fetch_assoc($posts)){
				$author = get_author_by_id($post["author_id"])["name"];
				$date = new DateTime($post["date"]);
				$date = $date->format('d M Y');
			?>
				<a href="../post?q=<?php echo($post["id"]) ?>" style="color: blue;" target="_blank"><?php echo($post["title"]) ?></a>
				<span><b><?php echo($author) ?></b> &nbsp;- &nbsp; <?php echo($date) ?></span>
				<span>
					<?php if($_SESSION['is_admin'] || $_SESSION['author_id'] === $post["author_id"]) { ?>
					<button type="button" class="btn btn-confirm" onclick="window.location='edit_post?q=<?php echo($post['id']) ?>';">Edit</button>
					<?php } ?>
					<?php if($_SESSION['is_admin']) { ?>
					<button type="button" class="btn btn-cancel" onclick="ajaxDeletePost(<?php echo($post['id']) ?>)">Delete</button>
					<?php } ?>
				</span>
			<?php } ?>
		</div>			
	</div>

	<script>
		function ajaxDeletePost(postId) {
			if(confirm("Delete post?")) {
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

				xmlhttp.open('GET', '../action/cms/ajax_delete_post.php?id=' + postId, true);
				xmlhttp.send();
			}
		}
	</script>
</body>
</html>