<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<div>
			<form action="home.php" method="post" style="width: fit-content; border: 2px dashed black; padding: 10px">
				<label for="name">Name</label><br>
				<input name="username" id="name" placeholder="Enter username" required><br>
				<label for="pass">Password</label><br>
				<input name="pass" id="pass" placeholder="Enter password" required><br>

				<div style="text-align: right;">
					<button>Login</button>
				</div>
			</form>
		</div>
	</body>
</html>