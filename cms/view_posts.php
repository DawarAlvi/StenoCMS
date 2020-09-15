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
	<?php $nav_current = "view_posts"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form method="post">
			<div class="section">
				<h2>All Posts - by date</h2>
				<span>Post 1 example title</span> <span>Dawar Alvi &nbsp;- &nbsp;2 Jan 2020</span><button type="button" class="btn btn-confirm">View</button>
				<span>Post 2 example title</span> <span>Dawar Alvi &nbsp;- &nbsp;1 Jan 2020</span><button type="button" class="btn btn-confirm">View</button>
				<span>Post 3 example title</span> <span>Dawar Alvi &nbsp;- &nbsp;4 Dec 2019</span><button type="button" class="btn btn-confirm">View</button>
				
			</div>			
			
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