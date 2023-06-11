<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.Connection"%>
<%@page import="DBUtil.DBConnection"%>
<html>
<body>
	<%
		Connection conn = DBConnection.getConnection();
		Integer id = (Integer)session.getAttribute("id");
		try {
			Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
			String query = "select * from tasks where user_id=" + id + ";";
			ResultSet result = stmt.executeQuery(query);
			result.last();
			if (result.getRow() == 0) {
				%>
				<h3><font color="red">No Tasks to View</font></h3>
				<%
			} else {
				result.first();
				%>
				<table border=1>
					<thead>
						<tr>
							<th>Name</th>
							<th>Priority</th>
						</tr>
					</thead>
					<tbody>
						<%
							do {
								%>
								<tr>
									<td><%= result.getString("name") %></td>
									<td><%= result.getString("priority") %></td>
								</tr>
								<%
							} while (result.next());
						%>
					</tbody>
				</table>
				<%
			}
		} catch (Exception ignored) {}
	%>
</body>
</html>