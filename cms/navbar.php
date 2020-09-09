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
	<?php $nav_current = "navbar"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form>
			<div class="section">
				<h2>Default</h2>
				<label>HOME</label> <input type="checkbox">
				<label>CATEGORIES</label> <input type="checkbox">
				<label>ABOUT</label> <input type="checkbox">
				<label>CONTACT</label> <input type="checkbox">
			</div>			
			
			<div class="section">
				<h2>Categories</h2>
				<label>Tech</label> <input type="checkbox">
				<label>Laptops</label> <input type="checkbox">
				<label>News</label> <input type="checkbox">
				<label>Smart Phones</label> <input type="checkbox">
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