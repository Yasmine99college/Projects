package mainPackage;
import java.awt.Graphics;
import java.util.LinkedList;
import objects.GameObjectClass;

public class Handler {
	
	public LinkedList<GameObjectClass> object = new LinkedList<GameObjectClass>();
	
	public void tick() {
		for (int i = 0; i < object.size(); i++) {
			GameObjectClass tempObject = object.get(i);
			
			tempObject.tick();
		}
	}

	
	public void render(Graphics g) {
		for (int i = 0; i < object.size(); i++) {
			GameObjectClass tempObject = object.get(i);
			
			tempObject.render(g);
		}
	}
	
	public void addObject(GameObjectClass object) {
		this.object.add(object);
	}
	
	public void removeObject(GameObjectClass object) {
		this.object.remove(object);
	}

}
