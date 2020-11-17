<?php
	require_once("../includes/session.php");
	if(!isset($_SESSION['author_id'])) {
		header("Location: ../login");
		die;
	}
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
    <link rel="icon" type="image/x-icon" href="../img/steno_logo.png">

	<script>
		function view_post(id) {
			window.location.href = "view_post?q=" + id;
		}
	</script>
</head>

<body>
	<?php 
		$nav_current = "view_posts";
		require_once("../includes/cms/nav.php");

		$posts = get_latest();
	?>

    <div class="main">
		<div class="section">
			<h2>All Posts - by date</h2>
			<?php
				while($post = mysqli_fetch_assoc($posts)){
					$author = get_author_by_id($post["author_id"])["name"];
					$date = new DateTime($post["date"]);
					$date = $date->format('d M Y');
					echo('
						<span>' . $post["title"] . '</span><span><b>' . $author . '</b> &nbsp;- &nbsp; ' . $date . '</span><button type="button" class="btn btn-confirm" onclick="view_post('.$post['id'].')">View</button>
					');
				}
			?>
		</div>			
        <form method="post">
			<div class="section-last">
				<select>
					<option>Date</option>
					<option>Author</option>
				</select>
				<input type="submit" value="sort" class="btn btn-confirm"title="Sort">
			</div>
		</form>
	</div>
	


</body>
</html>