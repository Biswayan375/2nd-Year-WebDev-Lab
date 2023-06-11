package ApplicationServlets;

import java.io.IOException;
import java.sql.Connection;
import java.sql.SQLException;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import DBUtil.DBConnection;

@WebServlet("/register")
public class RegistrationServlet extends HttpServlet {
	@Override
	public void doGet(HttpServletRequest req, HttpServletResponse res)
			throws ServletException, IOException {
		req.getRequestDispatcher("static/registration.jsp").forward(req, res);
	}
	
	@Override
	public void doPost(HttpServletRequest req, HttpServletResponse res)
			throws ServletException, IOException {
		String name = req.getParameter("username"),
				pass = req.getParameter("passkey");
		Connection conn = DBConnection.getConnection();
		try {
			Statement stmt = conn.createStatement();
			String query = "insert into todo_app.user(`name`, `password`) values('" + name + "', '" + pass + "');";
			stmt.executeUpdate(query);
			stmt.close();
			res.sendRedirect("login");
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}
