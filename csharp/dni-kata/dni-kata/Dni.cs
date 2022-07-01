namespace dni_kata;

public class Dni
{
    public Dni(string value)
    {
        CheckValueLength(value);
        var lastCharacter = value[8];

        if (!char.IsLetter(lastCharacter))
        {
            throw new Exception();
        }

    }

    private static void CheckValueLength(string value)
    {
        if (value.Length > 9)
            throw new Exception();
        if (value.Length < 9)
            throw new Exception();
    }
}
