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
</head>

<body>
	<?php
		$nav_current = "view_authors";
		require_once("../includes/cms/nav.php");
	?>

    <div class="main">
		<div class="section">
			<h2>All Authors - by name</h2>
			<?php
				$authors = get_authors();
				
				while($author = mysqli_fetch_assoc($authors)) {

					$query = 'SELECT COUNT(*) FROM posts WHERE author_id = ' . $author['id'];
					$no_of_posts = mysqli_query($connection, $query);

					echo('<span><b>');
		
					if($author['is_admin'] === '1')
						echo('Admin - ');
					else
						echo('Author - '); 
					
					echo('</b>' . $author['name'] . '</span>
						<span>' . mysqli_fetch_row($no_of_posts)[0] . '</span>
						<button type="button" class="btn btn-confirm" onclick="viewModal(' . $author['id'] . ',\'' . $author['name'] . '\',\'' . $author['email'] . '\',' . $author['is_admin'] . ',\'' . $author['about'] . '\');">View</button>
					');
				}
			?>
		</div>			
		
		<div class="section-last">
			<select>
				<option>Name</option>
				<option>No. of posts</option>
			</select>
			<button type="button" value="sort" class="btn btn-confirm">Sort</button>
		</div>
	</div>
	<!-- Main End -->



	<!-- View Modal -->
	<div class="modal" id="viewModal" onclick="this.style.display='none';authorId=0;">
		<div onclick="event.stopPropagation();">
			<form action="../action/cms/edit_author_submit.php" method="post">
				<h1 id="nameh1"></h1>
				<div>
					<?php if($_SESSION["is_admin"]) { ?>
					<button type="button"class="btn btn-cancel" onclick="deleteAuthor();" id="modalDelete">Delete</button>
					<?php } ?>
	
					<button type="button"class="btn btn-confirm" onclick="document.querySelector('#viewModal').style.display='none';authorId=0;">Cancel</button>
				</div>
			
				<label>Name *</label> 			<input type="text" name="name" id="name" required>
				<label>Email *</label> 			<input type="text" name="email" id="email" required>
				<label>Password </label> 		<input type="password" name="password">
				<label>Retype Password</label> 	<input type="password" name="password2">
				<label>Make Admin</label> 		<input type="checkbox" name="admin" id="admin">
				<label>About *</label> 			<textarea name="about" id="about" required></textarea>
			</form>
		</div>
	</div>

	<script>
		let authorId = 0;

		function viewModal(id, name, email, admin, bio) {
			authorId = id;
			document.querySelector("#nameh1").innerText = name;
			document.querySelector("#name").value = name;
			document.querySelector("#email").value = email;

			if(admin === 1)
				document.querySelector("#admin").checked = true;
			else
				document.querySelector("#admin").checked = null;

			document.querySelector("#about").innerText = bio;

			document.querySelector("#viewModal").style.display = "flex"
			
		}

		function deleteAuthor() {
			if(confirm("Delete message?")) {
				window.location = "../action/cms/delete_author.php?id=" + authorId;
			}
		}
	</script>

</body>
</html>