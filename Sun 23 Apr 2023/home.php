<?php
	session_start();
?>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<?php
		if (!isset($_SESSION["username"])) {
			if (isset($_POST['username'])) {
				$_SESSION['username'] = $_POST['username'];
			} else {
				header("Location: http://localhost/session/login.php");
			}
		}
	?>
	
	<h1>Hello <?php echo $_SESSION['username']; ?></h1>

	<form action="logout.php">
		<button>Logout</button>
	</form>
</body>
</html>