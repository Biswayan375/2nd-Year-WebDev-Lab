<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Home</title>
<link rel="stylesheet" href="http://localhost:8080/ToDo/static/home-style.css">
</head>
<body>
	<%
		String name = (String)session.getAttribute("user");
	%>
	<nav>
		<section id="greet-user">
			<h3>Hello <font color="green"><%= name %></font></h3>
		</section>
		<section>
			<h2>ToDo - Task Planner</h2>
		</section>
		<form action="logout" method="post">
			<button class="logout-btn">Logout</button>
		</form>
	</nav>
	
	<div class="container">
		<section class="task-create">
			<jsp:include page="./task-form-component.jsp"></jsp:include>
		</section>
		<section class="task-view">
			<jsp:include page="./task-view-component.jsp"></jsp:include>
		</section>
	</div>
</body>
</html>