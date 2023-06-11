package Test;

class SingletonClass {
	static SingletonClass obj = null;
	
	private SingletonClass() {
		System.out.println("constructor called");
	}
	
	public static SingletonClass getInstance() {
		if (obj == null)
			obj = new SingletonClass();
		return obj;
	}
}

public class Singleton {
	public static void main(String[] args) {
		SingletonClass obj = SingletonClass.getInstance(),
				obj1 = SingletonClass.getInstance();
	}
}
