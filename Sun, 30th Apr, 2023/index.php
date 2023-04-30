<?php session_start(); ?>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<div style="text-align: center;">
		<?php
			if (!isset($_SESSION['count'])) {
				$_SESSION['count'] = 0;
			}
		?>
		<h2><?php echo $_SESSION['count']; ?></h2>
	</div>

	<form action="#" method="post">
		<button name="increment-form-submit">Increment</button>
	</form>

	<form action="#" method="post">
		<button name="decrement-form-submit">Decrement</button>
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// this is a post request
			if (isset($_POST['increment-form-submit'])) {
				// 1st form is submitted
				$_SESSION['count'] = $_SESSION['count'] + 1;
			} else if (isset($_POST['decrement-form-submit'])) {
				// 2nd form is submitted
				$_SESSION['count'] = $_SESSION['count'] - 1;
			}
		}
	?>
</body>
</html>