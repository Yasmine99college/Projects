package Manager;

public class LoadCommand implements Command{

	@Override
	public void execute() {
		LoadManager.execute();
	}

}