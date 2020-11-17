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
</head>

<body>
	<?php
		$nav_current = "view_authors";
		require_once("../includes/cms/nav.php");
	?>

    <div class="main">
        <form method="post">
			<div class="section">
				<h2>All Authors - by name</h2>
				<?php
					$authors = get_authors();
					
					while($author = mysqli_fetch_assoc($authors)) {

						$query = 'SELECT COUNT(*) FROM posts WHERE author_id = ' . $author['id'];
						$no_of_posts = mysqli_query($connection, $query);

						echo('
							<span><b>
							');
							
						if($author['is_admin'] === '1')
							echo('Admin - ');
						else
							echo('Author - '); 
						
						echo('</b>' . $author['name'] . '</span>
							<span>' . mysqli_fetch_row($no_of_posts)[0] . '</span>
							<button type="button" class="btn btn-confirm">View</button>
						');
					}
				?>
			</div>			
			
			<div class="section-last">
				<select>
					<option>Name</option>
					<option>No. of posts</option>
				</select>
				<input type="submit" value="sort" class="btn btn-confirm"title="Sort">
			</div>
		</form>
	</div>
	
	

</body>
</html>