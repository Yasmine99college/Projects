package mainPackage;
import java.awt.Color;
import java.awt.Graphics;

public class HUD {
	
	public static int HEALTH = 100;
	
	private int greenValue = 255;
	
	private int score = 0;
	private int level = 1;
	
	public void tick() {
		HEALTH = GameMain.clamp(HEALTH, 0, 100);
		score++;
		
		greenValue = GameMain.clamp(greenValue, 0, 255);
		greenValue = HEALTH * 2;
	}

	public void render(Graphics g) {
		g.setColor(Color.gray);
		g.fillRect(15, 15, 200, 32);
		g.setColor(new Color(75, greenValue, 0));
		g.fillRect(15, 15, HEALTH * 2, 32);
		g.setColor(Color.white);
		g.drawRect(15, 15, 200, 32);
		
		g.drawString("Score: " + score, 550, 30);
		g.drawString("Level: " + level, 550, 45);
		
	}
	
	public void setScore(int score) {
		this.score = score;
	}
	
	public int getScore() {
		return score;
	}
	
	public void setLevel(int level) {
		this.level = level;
	}
	
	public int getLevel() {
		return level;
	}
}
