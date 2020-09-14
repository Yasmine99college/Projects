package objects;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Rectangle;
import java.util.Random;

import mainPackage.GameMain;
import mainPackage.HUD;
import mainPackage.Handler;
import mainPackage.ID;

public class Fruit extends GameObjectClass {
	
	//private BufferedImage image;
	Random r = new Random();
	Handler handler;
	
	public Fruit(int x, int y, ID id,Handler handler) {
		super(x, y, id);
		this.handler = handler;
		
		//velocityX = r.nextInt(5) + 1;
		//velocityY = r.nextInt(5);

	}
	
	public Rectangle getBounds() {
		return new Rectangle(x,y,32,32);
	}

	public void tick() {
		x += velocityX;
		y += velocityY;
		
		x = GameMain.clamp(x, 0, GameMain.WIDTH - 35);
		y = GameMain.clamp(y, 0, GameMain.HEIGHT - 65);
		
		handler.addObject(new Trail(x, y, ID.Trail ,Color.white, 32, 32, 0.1f, handler));
		
		collision();
	}
	
	public void collision() {
		for(int i = 0; i < handler.object.size(); i++) {
			GameObjectClass tempObject = handler.object.get(i);
			
			if(tempObject.getId() == ID.DangerousBomb) {
				if(getBounds().intersects(tempObject.getBounds())) {
					//collision code
					HUD.HEALTH -= 2;
					
				}
			}
		}
	
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
		g.setColor(Color.white);
		g.fillRect(x, y, 32, 32);
		//g.drawImage(this.getImage(), 100, 100,100,100, null);
	}
	

}
