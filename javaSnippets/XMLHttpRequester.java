import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;

public class XMLHttpRequester {
	public static void main(String[] args) throws IOException {
		String stringUrl = "http://www.w3schools.com/xml/note.xml";
	    URL url;
        
		try {
			url = new URL(stringUrl);
			 java.net.URLConnection uc = url.openConnection();
			 uc.setRequestProperty("X-API-KEY", "XXXXXXXXXXXXXXX");
			 uc.setRequestProperty("User-Agent", "Mozilla/5.0");
			 uc.setRequestProperty("content-type", "application/xml; charset=utf-8");
			 uc.setRequestProperty("Accept", "application/xml");
		     
			 BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(uc.getInputStream()));
		     String inputLine;
		        while ((inputLine = bufferedReader.readLine()) != null) 
		            System.out.println(inputLine);
		        bufferedReader.close();
		} catch (MalformedURLException e) {
			e.printStackTrace();
		}

	}
}
