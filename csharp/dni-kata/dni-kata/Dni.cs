namespace dni_kata;

public class Dni
{
    public Dni(string s)
    {
        if (s.Length>9)
         throw new Exception();
        if (s.Length < 9)
         throw new Exception();
    }
}
