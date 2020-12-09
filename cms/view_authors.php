<?php
	require_once("../includes/session.php");
	auth_user("author", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$authors = get_authors();
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
		<?php echo validation_errors();?>
		<?php echo messages();?>
		<div class="section">
			<h2>All Authors</h2>
			<?php
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
					<button type="button" class="btn btn-confirm" onclick="document.querySelector('#viewModal').style.display='none';authorId=0;">Cancel</button>
				</div>
				<?php if($_SESSION["is_admin"]) { ?>
				<b>Leave a field empty or at default value to not change it.</b>
				<?php } ?>
				<input type="text" name="id" id="id" required readonly hidden>
				<input type="text" name="old_email" id="old_email" required readonly hidden >
				<label>Name *</label> 			<input type="text" name="name" id="name" <?php $_SESSION["is_admin"]?print(""):print("readonly") ?>>
				<label>Email *</label> 			<input type="text" name="email" id="email" <?php $_SESSION["is_admin"]?print(""):print("readonly") ?>>
				<?php if($_SESSION["is_admin"]) { ?>
				<label>Password </label> 		<input type="password" name="password" minlength="6">
				<label>Retype Password</label> 	<input type="password" name="password2" minlength="6">
				<label>Make Admin</label> 		<input type="checkbox" name="admin" id="admin">
				<?php } ?>
				<label>About *</label> 			<textarea name="about" id="about" <?php $_SESSION["is_admin"]?print(""):print("readonly") ?>></textarea>
			
				<?php if($_SESSION["is_admin"]) { ?>
				<input type="submit" class="btn btn-confirm" value="Save">
				<?php } ?>
			</form>
		</div>
	</div>

	<script>
		let authorId = 0;

		function viewModal(id, name, email, admin, bio) {
			authorId = id;
			document.querySelector("#id").value = id;
			
			document.querySelector("#nameh1").innerText = name;
			document.querySelector("#name").value = name;
			document.querySelector("#old_email").value = email;
			document.querySelector("#email").value = email;


			<?php if($_SESSION["is_admin"]) { ?>
			if(admin === 1)
				document.querySelector("#admin").checked = true;
			else
				document.querySelector("#admin").checked = null;
			<?php } ?>

			document.querySelector("#about").innerText = bio;

			document.querySelector("#viewModal").style.display = "flex"
			
		}

		function deleteAuthor() {
			if(confirm("Delete author?")) {
				window.location = "../action/cms/delete_author.php?id=" + authorId;
			}
		}
	</script>

</body>
</html>