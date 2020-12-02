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
		display: flex;
		box-shadow: none;
		position: fixed;
		bottom: 0;
		padding: 0;
		margin: 1em;
		
	}

.btn {
	color: #000;
	background: #fff;
	margin: 2px;
	width:2.5em;
	min-height: 2.5em;
	line-height: 2.5em;
	border:1px solid black;
	border-radius:3px;
	cursor: pointer;
}
.btn-cancel {
	color: white;
	background:#f21;
	border:1px solid #f21;
	width:6em;
}
.btn-confirm {
	color: white;
	background: #04f;
	border:1px solid #04f;
	width:6em;
}
.btn-publish {
	color: white;
	background:#0a0;
	border:1px solid #0a0;
	width: 6em;
}

label, input, button{
	margin: .5em 0;
	line-height: 2.5em;
}
select {
	height: 3em;
	border-radius:4px;
}

input[type="file"], input{
	border: 1px solid #777;
	border-radius: 3px;
}


.modal {
	position: fixed;
	left: 0;
	top: 0;
	display: none;
	align-items: center;
	justify-content: center;
	width: 100%;
	height: 100%;
	background: #000000aa;
}
	.modal * {
		margin-top: 1em;
	}
	.modal form, .modal > div {
		max-height: 80vh;
		min-width: 80vw;
		max-width: 90vw;
		padding: 1em;
		border-radius: 3px;
		background: white;
		overflow-y: scroll;
	}
	.modal input[type="text"] {
		min-width: 250px;
	}

	#viewModal form {
		display: flex;
		flex-direction: column;
		min-height: 60em;
		overflow: hidden;
	}
	#viewModal form textarea {
		min-height: 3em;
	}
	
/* --*-- Mobile Ends --*-- */



/* --*-- Tablet Media Query --*-- */
@media (min-width:550px) {
	label, input, button {
		margin: 0;
	}
	
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

	.section-last .controls {
		position: fixed;
		right:1em;
	}


	.modal form, .modal > div {
		max-width: 60vw;
	}
}



/* --*-- Desktop Media Query --*-- */
@media (min-width:980px) {
		.main {
		margin-left: 15vw;
		width: 83.2vw;
	}

	.section-last .controls {
		right: 2.1em;
	}



	.modal form, .modal > div {
		min-width: 40vw;
		max-width: 50vw;
	}
}