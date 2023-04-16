<html>
	<head>
		<title>Multi Form Submission</title>
		<style>
			#title-text1 {
				color: red;
				font-size: 40px;
			}
			h2 {
				color: green;
				font-family: verdana;
				font-style: italic;
			}
			#info-text {
				font-size: 20px;
				color: blue;
			}

			.border {
				/*border: 3px dashed black;*/
				border-color: black;
				border-style: dashed;
				border-width: 4px;
				padding: 10px;
				color: pink !important;
			}
			.bg-blue {
				background-color: blue;
				color: white;
			}

			#form-div {
				border: 1px solid;
				padding: 10px;
				background-color: #9a2f36;
				color: white;
				background: url("http://localhost/spiderman.jfif");
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				color: black;
			}
		</style>
	</head>
	<body>
		<h2 style="font-family: cursive; color: black" id="title-text1">Multi Form</h2>
		<h2 class="border bg-blue" id="title-text2">Tag</h2>
		<h2 class="border" id="title-text3">Final</h2>

		<p class="bg-blue">This is a paragraph</p>
		<p id="info-text">This is information text</p>

		
		<section id="form-div">
			<img width="300px" src="http://localhost/spiderman.jfif">
			<form>
				<input placeholder="Enter your name">
				<p>Are you friendly neighbourhood spiderman?</p>
				<input style="display: inline;" type="radio"><span>Yes</span>
				<input style="display: inline;" type="radio"><span>No</span>
			</form>
		</section>
	</body>
</html>