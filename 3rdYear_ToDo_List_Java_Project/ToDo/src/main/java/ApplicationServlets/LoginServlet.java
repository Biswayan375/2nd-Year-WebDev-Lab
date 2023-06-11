package ApplicationServlets;

import java.io.IOException;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import DBUtil.DBConnection;

@WebServlet(name="LoginServlet", value={ "/login" })
public class LoginServlet extends HttpServlet {
	@Override
	public void doGet(HttpServletRequest req, HttpServletResponse res)
			throws ServletException, IOException {
		// handling GET request at /login
		req.getRequestDispatcher("static/login.jsp").forward(req, res);
	}
	
	@Override
	public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException {
		String name = req.getParameter("username"),
				passkey = req.getParameter("passkey");
		
		Connection conn = DBConnection.getConnection();
		try {
			Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_READ_ONLY);
			String query = "select id from user where name='" + name + "' and password='" + passkey + "'";
			ResultSet result = stmt.executeQuery(query);
			result.last();
			if (result.getRow() != 0) {
				// login
				HttpSession session = req.getSession();
				session.setAttribute("user", name);
				session.setAttribute("id", result.getInt("id"));
				System.out.println(result.getInt("id"));
				res.sendRedirect("home");
			} else {
				// no login
				res.sendRedirect("login");
			}
			stmt.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
}
