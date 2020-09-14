package mainPackage;

import java.awt.event.KeyEvent;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

import objects.GameObjectClass;

public class MouseInput extends MouseAdapter {
	
	private Handler handler;
	
	public MouseInput(Handler handler) {
		this.handler = handler;
		
		
	}
	
	public void mousePressed(MouseEvent e) {
		
		int key = e.get;
		
		for(int i = 0; i < handler.object.size(); i++) {
			GameObjectClass tempObject = handler.object.get(i);
			
			if(tempObject.getId() == ID.Fruit) {
				
				if(key == KeyEvent.VK_W) tempObject.setVelocityY(-5);
				if(key == KeyEvent.VK_S) tempObject.setVelocityY(5);
				if(key == KeyEvent.VK_D) tempObject.setVelocityX(5);
				if(key == KeyEvent.VK_A) tempObject.setVelocityX(-5);
			}
		}
	}
	
	public void mouseReleased(MouseEvent e) {
		
	}

}
