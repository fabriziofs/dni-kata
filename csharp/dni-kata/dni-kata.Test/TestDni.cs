namespace dni_kata.Test;

public class TestDni
{
    [Fact]
    public void Test_Dni_ShouldWorkWhenIsValid()
    {
        new Dni("31970165G");
    }

    [Fact]
    public void Test_Dni_ShouldBeNotLongerThan9()
    {
         Assert.Throws<Exception>(() => new Dni("1234567890"));
    }

    [Fact]
    public void Test_Dni_shouldBeNotShorterThan9()
    {
        Assert.Throws<Exception>(() => new Dni("1234567"));
    }

    [Fact]
    public void Test_Dni_LastCharacter_ShouldBeChar()
    {
        Assert.Throws<Exception>(() => new Dni("319701650"));
    }

    [Theory]
    [InlineData("31970165U")]
    [InlineData("31970165I")]
    [InlineData("31970165O")]
    [InlineData("31970165Ñ")]
    public void Test_Dni_LastCharacter_ShouldNotBeUION(string dniToCheck)
    {
        Assert.Throws<Exception>(() => new Dni(dniToCheck));
    }

    [Theory]
    [InlineData("31A70165G")]
    public void Test_Dni_ChecksumShouldMatch(string dniToCheck)
    {
        Assert.Throws<Exception>(() => new Dni(dniToCheck));
    }


    /* [Theory]
    [InlineData("31970165Y")]
    public void Test_Dni_ChecksumShouldMatch(string dniToCheck)
    {
        Assert.Throws<Exception>(() => new Dni(dniToCheck));
    }
    */

}
