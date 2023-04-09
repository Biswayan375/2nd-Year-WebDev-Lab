<html>
	<head>
		<title>Form</title>
	</head>
	<body>
		<h1>Form Handling</h1>
		<?php			
			// echo $_SERVER['REQUEST_METHOD'];
		?>
		<form method="POST">
			<input type="number" name="num1" required>
			<br>
			<select name="operation">
				<option value="0">+</option>
				<option value="1">-</option>
			</select>
			<br>
			<input type="number" name="num2" required>
			<br>
			<button>Calculate</button>
		</form>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				echo "<p>Enter some values to calculate</p>";
			} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($_POST['operation'] == 0) {
					$sum = $_POST['num1'] + $_POST['num2'];
					?>
					<input value=<?php echo $sum; ?> readonly>
					<?php
				}
				else if ($_POST['operation'] == 1) {
					$sub = $_POST['num1'] - $_POST['num2'];
					echo "<input value='".$sub."' readonly>";
				}
			}
		?>
	</body>
</html>