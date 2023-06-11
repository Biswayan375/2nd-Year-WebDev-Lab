<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>ToDo - Login</title>
<link rel="stylesheet" href="http://localhost:8080/ToDo/static/form-style.css">
</head>
<body>
	<div class="container">
		<form action="login" method="post">
			<input name="username" type="text" placeholder="Enter Username" required>
			<input name="passkey" type="password" placeholder="Enter Password" required>
			<button class="btn">Login</button>
			<a href="register">new around here?</a>
		</form>
	</div>
</body>
</html>