class Practical1{
	public static void main(String[] args){
		double var1;
		long iPart;
		double fPart;


		var1 = 1234.5678;
		iPart = (long) var1;
		fPart = var1 - iPart;
		System.out.println("Integer part = " + iPart);
		System.out.println("Fractional part = " + fPart);
	}
}