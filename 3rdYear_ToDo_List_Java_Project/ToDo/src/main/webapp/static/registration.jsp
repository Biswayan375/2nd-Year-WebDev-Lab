<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<link rel="stylesheet" href="http://localhost:8080/ToDo/static/form-style.css">
</head>
<body>
	<div class="container">
		<form onsubmit="handleSubmit(event)" method="post" action="register">
			<input id="name" name="username" type="text" placeholder="Enter Username">
			<span class="danger" id="name-info"></span>
			<input id="pass" name="passkey" type="password" placeholder="Create New Password">
			<span class="danger" id="passkey-info"></span>
			<input id="c-pass" name="confirm-passkey" type="password" placeholder="Confirm Password">
			<span class="danger" id="cpass-info"></span>
			<button class="btn">Register</button>
			<a href="login">Already have an account?</a>
		</form>
	</div>
	
	<script src="http://localhost:8080/ToDo/static/registerScript.js"></script>
</body>
</html>