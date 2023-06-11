<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<body>
	<form action="create-task" method="post">
		<input name="task-name" type="text" placeholder="Enter Task Name" required>
		<select name="task-priority">
			<option value="1">Low</option>
			<option value="2">Medium</option>
			<option value="3">High</option>
		</select>
		<button class="btn">Create</button>
	</form>
</body>
</html>