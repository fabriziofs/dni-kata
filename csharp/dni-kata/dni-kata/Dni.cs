namespace dni_kata;

public class Dni
{
    public static char[] INVALID_CHARACTERS = { 'U', 'I', 'O', 'Ñ' };

    private string cheskSumTable = "TRWAGMYFPDXBNJZSQVHLCKE";


    public Dni(string value)
    {
        CheckValueLength(value);
        CheckLastDigitIsLetter(value);
        CheckIfLastCharIsCorrect(value);
        int digitsvalue;
        if (!int.TryParse(value.Substring(0, 8), out digitsvalue))
        {
            throw new Exception();
        }

    }

    private static void CheckIfLastCharIsCorrect(string value)
    {
        foreach (char invalidChar in INVALID_CHARACTERS)
        {
            if (value[8] == invalidChar)
                throw new Exception();
        }
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
