package Manager;

import java.io.File;
import java.util.ArrayList;
import java.util.List;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;


import org.w3c.dom.DOMException;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;


public class LoadManager {

	public static void main(String[] args) {
		execute();
	}
	public static final String xmlFilePath = "saved.xml";

	public static void execute() {
		int score = 0;
		int lives = 0;
		try {

			File fXmlFile = new File(xmlFilePath);
			DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
			DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
			Document doc = dBuilder.parse(fXmlFile);
			
			score = Integer.parseInt(doc.getElementsByTagName("Score").item(0).getTextContent());
			lives = Integer.parseInt(doc.getElementsByTagName("Lives").item(0).getTextContent());
			
			GameMain.getInstance().setGameState(new GameState(score, lives)); //name of main instead of "GameMain"
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

}
