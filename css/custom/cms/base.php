<?php Header("Content-type: text/css; charset: utf-8") ?>

<?php require_once("../vars.php") ?>
<?php require_once("nav.php") ?>

.main form {
	padding-bottom: 8em;
}
	.main .section {
		background-color: #fff;
		margin:1em;
		padding:1em;
		border-radius:4px;
		box-shadow:2px 2px 4px #ccc;
		display: flex;
		flex-direction: column;
	}
	.main .section-last {
		display: inherit;
		box-shadow: none;
		position: fixed;
		bottom: 0;
		padding: 0;
		margin: 1em;
	}

.btn {
	color: #fff;
	width:5em;
	line-height: 3em;
	border:none;
	border-radius:4px;
	cursor: pointer;
}
.btn-cancel {
	background:red;
}
.btn-confirm {
	background:green;
}

label, input, button{
	margin: .5em 0;
	line-height: 3em;
}
select {
	height: 3em;
	border-radius:4px;
}

	
/* --*-- Mobile Ends --*-- */

/* --*-- Tablet Media Query --*-- */
@media (min-width:550px) {
		.main .section {
			display: grid;
			grid-template-columns: repeat(3,1fr);
			grid-gap: 1em;
		}
			.section h2 {
				grid-column: 1/4;
			}
			.section label {
				grid-column: 1/2;
			}
	
		.main .section-last {
			display: inherit;
		}
		
	label, input, button {
		margin: 0;
	}
}

/* --*-- Desktop Media Query --*-- */
@media (min-width:980px){
		.main {
		margin-left: 15vw;
		width: 83.2vw;
	}
}