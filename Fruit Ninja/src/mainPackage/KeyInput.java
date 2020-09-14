package mainPackage;

import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;

import objects.GameObjectClass;

public class KeyInput extends KeyAdapter{
	
	private Handler handler;
	
	public KeyInput(Handler handler) {
		this.handler = handler;
	}
	
	public void keyPressed(KeyEvent e) {
		int key = e.getKeyCode();
		
		for(int i = 0; i < handler.object.size(); i++) {
			GameObjectClass tempObject = handler.object.get(i);
			
			if(tempObject.getId() == ID.Fruit) {
				
				if(key == KeyEvent.VK_UP) tempObject.setVelocityY(-5);
				if(key == KeyEvent.VK_DOWN) tempObject.setVelocityY(5);
				if(key == KeyEvent.VK_RIGHT) tempObject.setVelocityX(5);
				if(key == KeyEvent.VK_LEFT) tempObject.setVelocityX(-5);
			}
		}
		
	}
	
	public void keyReleased(KeyEvent e) {
		
		int key = e.getKeyCode();

		for(int i = 0; i < handler.object.size(); i++) {
			GameObjectClass tempObject = handler.object.get(i);
			
			if(tempObject.getId() == ID.Fruit) {
				
				if(key == KeyEvent.VK_UP) tempObject.setVelocityY(0);
				if(key == KeyEvent.VK_DOWN) tempObject.setVelocityY(0);
				if(key == KeyEvent.VK_RIGHT) tempObject.setVelocityX(0);
				if(key == KeyEvent.VK_LEFT) tempObject.setVelocityX(0);
			}
		}
	}

}
