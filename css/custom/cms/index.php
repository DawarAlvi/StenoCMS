<?php Header("Content-type: text/css; charset: utf-8") ?>

<?php require_once("../vars.php") ?>
<?php require_once("nav.php") ?>

.main {
    text-align: center;
	font-family: 'Inter',sans-serif;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
.main h1{
	font-size: 4em;
	font-weight: normal;
}
.main p{
	font-size: 2em;
	font-weight: normal;
}
.main a {
	background: red;
	width: 5em;
	line-height: 3em;
	border-radius: 4px;
}
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px) {
	.main {
		margin-left: 15vw;
		width: 85vw;
		height: 100vh;
	}
}