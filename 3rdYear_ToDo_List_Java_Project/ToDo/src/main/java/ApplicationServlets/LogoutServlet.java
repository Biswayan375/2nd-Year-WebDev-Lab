package ApplicationServlets;

import java.io.IOException;

import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/logout")
public class LogoutServlet extends HttpServlet {
	@Override
	public void service(HttpServletRequest req, HttpServletResponse res) throws IOException {
		HttpSession session = req.getSession();
		if (session.getAttribute("user") != null) {
			session.removeAttribute("user");
			session.removeAttribute("id");
			session.invalidate();
		}
		res.sendRedirect("login");
	}
}
