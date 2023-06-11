package DBUtil;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

import com.mysql.cj.jdbc.Driver;

public class DBConnection {
	private final String USERNAME = "root",
			PASSWORD = "",
			URL = "jdbc:mysql://localhost:3306/todo_app";
	static Connection conn = null;
	
	private DBConnection() {
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			conn = DriverManager.getConnection(URL, USERNAME, PASSWORD);
			System.out.println("Succesfully connected to database");
		} catch (Exception e) {
			System.out.println("Error occurred while trying to create database connection - \n" + e.getMessage());
			conn = null;
		}
	}
	
	public static Connection getConnection() {
		if (conn == null)
			new DBConnection();
		return conn;
	}
	
	public static void closeConnection()
			throws SQLException {
		if (conn != null)
			conn.close();
	}
}
