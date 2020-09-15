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
	<?php $nav_current = "view_authors"; ?>
    <?php require_once("../includes/cms/nav.php"); ?>

    <div class="main">
        <form method="post">
			<div class="section">
				<h2>All Authors - by name</h2>
				<span>Dawar Alvi</span><span>5</span><button type="button" class="btn btn-confirm">View</button>
				<span>John Doe</span><span>14</span><button type="button" class="btn btn-confirm">View</button>
				<span>Abc</span><span>56</span><button type="button" class="btn btn-confirm">View</button>
				<span>TestName</span><span>63</span><button type="button" class="btn btn-confirm">View</button>

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