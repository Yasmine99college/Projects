package objects;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.image.BufferedImage;
import java.util.Random;

import mainPackage.ID;

public class Knife extends GameObjectClass {
	
	private BufferedImage image;
	Random r = new Random();
	
	public Knife(int x, int y, ID id) {
		super(x, y, id);


	}

	public void tick() {
		x += velocityX;
		y += velocityY;
	}
	/*public BufferedImage getImage() {
		try {
			image = ImageIO.read(getClass().getResourceAsStream("/bomb.png"));
		}catch(IOException e) {
			e.printStackTrace();
		}
		return image;
	}*/
	
	public void render(Graphics g) {
		g.setColor(Color.blue);
		g.fillRect(x, y, 10, 36);
		//g.drawImage(this.getImage(), 100, 100,100,100, null);
	}
	

}
