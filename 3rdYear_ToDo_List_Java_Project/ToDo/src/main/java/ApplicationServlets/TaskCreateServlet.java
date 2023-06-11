package ApplicationServlets;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;

import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import DBUtil.DBConnection;

@WebServlet("/create-task")
public class TaskCreateServlet extends HttpServlet {
	@Override
	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		HttpSession session = req.getSession();
		String name = req.getParameter("task-name"),
				prior = req.getParameter("task-priority");
		Integer id = (Integer)session.getAttribute("id");
					
		
		Connection conn = DBConnection.getConnection();
		try {
			Statement stmt = conn.createStatement();
			String query = "insert into tasks(`user_id`, `name`, `priority`) values(" + id + ", '" + name + "', " + prior + ")";
			System.out.println(query);
			stmt.executeUpdate(query);
			stmt.close();
		} catch (SQLException e) {
			
			e.printStackTrace();
		} finally {
			res.sendRedirect("home");
		}
	}
}
