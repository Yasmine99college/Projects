package mainPackage;

import java.util.Random;

import objects.DangerousBomb;

public class Spawn {
	
	private Handler handler;
	private HUD hud;
	private Random r =new Random();
	
	private int scoreKeep = 0;
	
	public Spawn(Handler handler, HUD hud) {
		this.handler = handler;
		this.hud = hud;
	}
	
	public void tick() {
		scoreKeep ++;
		
		if(scoreKeep >= 50) {
			scoreKeep = 0;
			hud.setLevel(hud.getLevel() + 1);
			
			if(hud.getLevel() == 2) {
				handler.addObject(new DangerousBomb(r.nextInt(GameMain.WIDTH), r.nextInt(GameMain.HEIGHT), ID.DangerousBomb));
			}
		}
	}

}
