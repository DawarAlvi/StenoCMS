<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Steno | CMS</title>

    <!-- STYLES -->
    <link rel="stylesheet" href="../css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../css/custom/cms/base.php" type="text/css">

    <!--FAVICONS-->
    <link rel="icon" type="image/x-icon" href="../img/steno_logo.png">
</head>

<body>
    <?php require_once("../includes/functions.php"); ?>
	<?php $nav_current = "contact"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form>
			<div class="section">
				<h2>Banner</h2>
				<label>Banner Contact Background</label> <input type="file">
				<button class="btn btn-cancel" onclick="" title="Deletes your uploaded image from the server">default</button>
				
				<label>Banner Contact Title</label> <input type="text">
				
				<label>Banner Contact Caption</label> <input type="text">
			</div>
			
			<div class="section">
				<h2>Messages</h2>
				<label>Dawar Alvi</label> 8 Aug 2020 
				<button type="button" class="btn btn-confirm" id="view_message" onclick="showModal();" title="Edit Category">View</button>
				
				<label>John Doe</label> 6 April 2020 
				<button class="btn btn-confirm" id="view_message2" title="Edit Category">View</button>
				
				<label>Jane Doe</label> 23 Feb 2020 
				<button class="btn btn-confirm" id="view_message3" title="Edit Category">View</button>
				
				<label>Some Guy</label> 13 Jan 2020 
				<button class="btn btn-confirm" id="view_message4" title="Edit Category">View</button>

			</div>
			
			<div class="section-last">
				<button class="btn btn-cancel" onclick="window.location.reload()" title="Discard changes">cancel</button>
				<input type="submit" value="save" class="btn btn-confirm"title="Save changes">
			</div>
		</form>
	</div>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Dawar Alvi</h2>
	  <a href="mailto:abc@test.com">abc@test.com</a>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body. Test modal text in the modal box made for testing the modal box.</p>
    </div>
    <div class="modal-footer">
      <button class="btn btn-cancel" onclick="" title="Delete This Message">Delete</button>
    </div>
  </div>

</div>

<script src="../js/custom/modal.js"></script>


</body>
</html>