package Manager;


public class SaveCommand implements Command {

	@Override
	public void execute() {
		GameMain game = GameMain.getInstance(); //name of main instead of "GameMain"
		SaveManager.execute(game.getGameState());
	}

}
