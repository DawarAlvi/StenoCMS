<?php
	require_once("../includes/session.php");
	auth_user("author", ".");
	require_once("../includes/db_connect.php");
	require_once("../includes/functions.php");

	$banner_info 	 = get_banner_info("contact");
	$title 			 = $banner_info["title"];
	$caption 		 = $banner_info["caption"];

	$messages = get_messages();
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
    <?php file_exists('../img/branding/custom_favicon.jpg')?print('<link rel="icon" type="image/x-icon" href="../img/branding/custom_favicon.jpg">'):print('<link rel="icon" type="image/x-icon" href="../img/branding/default_favicon.png">'); ?>
</head>

<body>
	<?php $nav_current = 'contact'; ?>
    <?php require_once('../includes/cms/nav.php'); ?>

    <div class="main">
		<?php echo validation_errors();?>
		<?php echo messages();?>
        <form method="post" action="../action/cms/contact_submit.php" enctype="multipart/form-data">
		
		
		<?php if($_SESSION['is_admin']) { ?>
			<div class="section">
				<h2>Banner</h2>
				<label for="bc_bg">Banner Contact Background</label> <input type="file" name="banner_contact_bg" id="bc_bg">
				<span>
					<button type="button" class="btn"  title="Clear" onclick="document.getElementById('bc_bg').value='';"><span class="fal fa-times"></span></button>
					<button type="button" class="btn btn-cancel"  title="Use the default image" onclick="ajaxDeleteImage('bannercontact')">Default</button>
				</span>
				
				<label>Banner Contact Title</label> <input type="text" name="banner_contact_title" value="<?php echo($title) ?>">
				
				<label>Banner Contact Caption</label> <input type="text" name="banner_contact_caption" value="<?php echo($caption) ?>">
			</div>
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
		<?php } ?>
			
			<div class="section">
				<h2>Messages</h2>
				<?php while($message = mysqli_fetch_assoc($messages)) { ?>
					<span><?php echo($message['sender']) ?></span>
					<span><?php echo(get_date($message['date'])) ?></span> 
					<button type="button" class="btn btn-confirm" onclick="showMessageModal(<?php echo($message['id']) ?>, '<?php echo($message['sender']) ?>', '<?php echo($message['email']) ?>','<?php echo(get_date($message['date'])) ?>' , '<?php echo($message['contents']) ?>');" title="View message">View</button>
				<?php } ?>
			</div>
		</form>
	</div>
	<!-- Main End -->



	<!-- Message Modal -->
	<div class="modal" id="messageModal" onclick="this.style.display='none';messageId = 0;">

		<div onclick="event.stopPropagation();">
			<div>
				<h1>Message</h1>

				<?php if($_SESSION["is_admin"]) { ?>
				<button type="button"class="btn btn-cancel" onclick="deleteMessage();" id="modalDelete">Delete</button>
				<?php } ?>

				<button type="button"class="btn btn-confirm" onclick="document.getElementById('messageModal').style.display='none';messageId = 0;">Close</button>
			</div>
			<h2 id="messageName"></h2>
			<a href="#" id="messageMail" style="color: black;"></a>
			<p id="messageDate"></p>
			<p id="messageContent"></p>
		</div>
	</div>

	<script>
		let messageId = 0;

		function showMessageModal(id, name, email, date, content) {
			messageId = id;

			document.getElementById("messageName").innerText = name;
			document.getElementById("messageMail").innerText = email;
			document.getElementById("messageMail").href = "mailto:" + email;
			document.getElementById("messageDate").innerText = date;
			document.getElementById("messageContent").innerHTML = content;

			document.getElementById("messageModal").style.display="flex";
		}

		function deleteMessage() {
			if(confirm("Delete message?")) {
				window.location = "../action/cms/delete_message.php?id=" + messageId;
			}
		}
	</script>

	<script src="../js/custom.js"></script>
</body>
</html>