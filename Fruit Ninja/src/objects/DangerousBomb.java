package objects;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Rectangle;
import java.awt.image.BufferedImage;
import java.io.IOException;
import java.util.Random;

import javax.imageio.ImageIO;

import mainPackage.GameMain;
import mainPackage.GameObject;
import mainPackage.ID;

public class DangerousBomb extends GameObjectClass implements GameObject {
	
	private BufferedImage image;
	Random r = new Random();
	
	public DangerousBomb(int x, int y, ID id) {
		super(x, y, id);
		velocityX = r.nextInt(5) + 1;
		velocityY = - r.nextInt(5);
	}


	public Rectangle getBounds() {
		return new Rectangle(x,y,16,16);
	}
	
	public void tick() {
		x += velocityX;
		y += velocityY;
		
		y = GameMain.clamp(y, 0, GameMain.HEIGHT-32);
		x = GameMain.clamp(x, 0, GameMain.WIDTH-32);
		if (y <=0 || y >= GameMain.HEIGHT-32) velocityY *= -1;
		
		if (x <=0 || x >= GameMain.WIDTH-32) velocityX *= -1;
		
	}

	public void render(Graphics g) {
		
		g.setColor(Color.red);
		g.fillRect(x, y, 16, 16);
		//g.drawImage(this.getBufferedImages(), 100, 100,100,100, null);
	}

	
	public ID getObjectType() {
		return ID.DangerousBomb;
	}

	
	public int getXlocation() {
		return this.getX();
	}

	
	public int getYlocation() {
		return this.getY();
	}

	
	public int getMaxHeight() {
		return GameMain.HEIGHT;
	}

	public int getInitialVelocity() {
		return 0;
	}

	public int getFallingVelocity() {
		return 0;
	}

	public Boolean isSliced() {
		return null;
	}

	public Boolean hasMovedOffScreen() {
		return null;
	}

	public void slice() {
		
	}


	public void move(double time) {
		
	}

	public BufferedImage getBufferedImages() {
		try {
			image = ImageIO.read(getClass().getResourceAsStream("/bomb.jpg"));
		}catch(IOException e) {
			e.printStackTrace();
		}
		return image;
	}

}
