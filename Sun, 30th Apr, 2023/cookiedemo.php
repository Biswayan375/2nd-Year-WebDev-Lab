<!DOCTYPE html>
<html>
<head>
	<title>Cookie</title>
</head>
<body>
	<form action="#" method="post">
		<input name="name" placeholder="Enter name" required>
		<input name="food" placeholder="Your favourite food" required>
		<br>
		<button name="food-entry-form">Submit</button>
	</form>

	<form action="#" method="post">
		<button name="show-record-form">Show Records</button>
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['food-entry-form'])) {
				// enter some food
				if (!isset($_COOKIE['name']) && !isset($_COOKIE['food'])) {
					$name = array($_POST['name']);
					$food = array($_POST['food']);
					setcookie("name", serialize($name));
					setcookie("food", serialize($food));
				} else {
					$name = unserialize($_COOKIE['name']);
					$food = unserialize($_COOKIE['food']);

					array_push($name, $_POST['name']);
					array_push($food, $_POST['food']);

					setcookie("name", serialize($name));
					setcookie("food", serialize($food));
				}
			} else if (isset($_POST['show-record-form'])) {
				if (isset($_COOKIE['name']) && isset($_COOKIE['food'])) {
					$name_arr = unserialize($_COOKIE['name']);
					$food_arr = unserialize($_COOKIE['food']);

					?>
					<table border="1">
						<thead>
							<tr>
								<th>Name</th>
								<th>Favourite Food</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i = 0; $i < sizeof($name_arr); $i++) {
								?>
								<tr>
									<td style="text-align: center"><?php echo $name_arr[$i]; ?></td>
									<td style="text-align: center"><?php echo $food_arr[$i]; ?></td>
									<td>
										<form action="#" method="post">
											<input style="display: none" name="delete-key" value="<?php echo $i; ?>" readonly>
											<button name="delete-form">Delete</button>
										</form>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<?php
				}
			} else if (isset($_POST['delete-form'])) {
				echo $_POST['delete-key'];
			}
		}
	?>
</body>
</html>