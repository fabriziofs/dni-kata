namespace dni_kata.Test;

public class TestDni
{
    [Fact]
    public void Test_Dni_ShouldBeNotLongerThan8()
    {
         Assert.Throws<Exception>(() => new Dni("123456789"));
    }

    [Fact]
    public void Test_Dni_shoulBeNotShorterThan8()
    {
        Assert.Throws<Exception>(() => new Dni("1234567"));
    }

}
