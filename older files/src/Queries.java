import java.io.*;
import java.util.HashSet;
import java.util.Set;
public class Queries {
	
	private static String dataPath = "Oscar_Data.txt";
	
	public static String WinnersByYear(String year) throws IOException {
		String toReturn = "";
		
		File file = new File(dataPath);
		BufferedReader br = new BufferedReader(new FileReader(file));
		String line;
		
		//look at each line of the file
		while(((line = br.readLine()) != null)){
			//split line at first comma, giving us the year at index 0
			if(line.split(",", 2)[0].compareTo(year) == 0) {
				//line is correct year, now fully split
				String newLine[] = line.split(",");
				//check if this line contains a winner
				if(newLine[2].compareTo("True") == 0) {
					toReturn = line;
				}
			}
		}
		return toReturn;
	}
	
	
	public static String WinnersByYearCategory(String year, String category) throws IOException {
		String toReturn = "";
		
		File file = new File(dataPath);
		BufferedReader br = new BufferedReader(new FileReader(file));
		String line;
		
		//look at each line of the file
		while(((line = br.readLine()) != null)){
			//split line at first comma, giving us the year at index 0
			if(line.split(",", 2)[0].compareTo(year) == 0) {
				//line is correct year, now fully split
				String newLine[] = line.split(",");
				//check if this line is correct category && is a winner
				if((newLine[1].compareToIgnoreCase(category) == 0) && newLine[2].compareTo("True") == 0) {
					toReturn = line;
				}
			}
		}
		return toReturn;
	}
	
	public static String CategoriesByYear(String year) throws IOException {
		String toReturn = "";
		Set<String> categories = new HashSet<String>();
		
		File file = new File(dataPath);
		BufferedReader br = new BufferedReader(new FileReader(file));
		String line;
		
		//look at each line of the file
		while(((line = br.readLine()) != null)){
			//split line at first comma, giving us the year at index 0
			if(line.split(",", 2)[0].compareTo(year) == 0) {
				//line is correct year, now fully split
				String newLine[] = line.split(",");
				//grab the category from this year
				categories.add(newLine[1]);
			}
		}
		
		//create delimited string to send back
		for(String st: categories) {
			toReturn += st;
			toReturn += ",";
		}
		
		//remove last comma from string to prevent issues later on
		if(toReturn.length() > 0) {
			toReturn = toReturn.substring(0, toReturn.length()-1);
		}
		
		
		return toReturn;
	}
	
	
}
