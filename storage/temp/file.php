<?php class TestSomething extends UnitTestCase
{
    
    function testValueisTrue()
    {
        $value = true;
        $this->assertTrue($value);
    }
}

$test = new TestSomething();
$test->run(new HtmlReporter());
