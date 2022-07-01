namespace dni_kata;

public class Dni
{
    public Dni(string value)
    {
        CheckValueLength(value);
        CheckLastDigitIsLetter(value);
        if (value[8] == 'U')
            throw new Exception();
        if (value[8] == 'I')
            throw new Exception();
        if (value[8] == 'O')
            throw new Exception();
        if (value[8] == 'Ñ')
            throw new Exception();
    }

    private static void CheckLastDigitIsLetter(string value)
    {
        if (!char.IsLetter(value[8]))
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
