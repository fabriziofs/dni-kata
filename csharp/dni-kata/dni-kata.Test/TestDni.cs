namespace dni_kata.Test;

public class TestDni
{
    [Fact]
    public void Test_Dni_ShouldWorkWhenIsValid()
    {
        new Dni("31970165G");
    }

    [Fact]
    public void Test_Dni_ShouldBeNotLongerThan8()
    {
         Assert.Throws<Exception>(() => new Dni("1234567890"));
    }

    [Fact]
    public void Test_Dni_shouldBeNotShorterThan8()
    {
        Assert.Throws<Exception>(() => new Dni("1234567"));
    }

    [Fact]
    public void Test_Dni_LastCharacter_ShouldBeChar()
    {
        Assert.Throws<Exception>(() => new Dni("319701650"));
    }

}
