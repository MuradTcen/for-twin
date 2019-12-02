<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class TestSequence extends TestCase
{
    private $digits;

    private $length = 100;

    public function setUp()
    {
        parent::setUp();

        $this->digits = $this->getDigits($this->length);
    }

    public function testFirstCasePass()
    {
        $sequence = new Sequence([111, 234, 3, 667, 4, 5, 76], 2);

        $numbers = $sequence->getMaxNumbers();

        $this->assertEquals($numbers,  [234, 667]);
    }

    public function testSecondCasePass()
    {
        $array = [111, 234, 3, 667];

        $sequence = new Sequence($array, 4);

        $numbers = $sequence->getMaxNumbers();

        sort($array);

        $this->assertEquals($numbers, $array);
    }

    public function testLoggingPass()
    {
        $sequence = new Sequence($this->digits, 4);

        $sequence->setLogging(true);

        $sequence->getMaxNumbers();

        $this->markTestSkipped('Logging simple test case');
    }

    public function testLoggingWithWrongCountPass()
    {
        $sequence = new Sequence($this->digits, $this->length + 1);

        $sequence->setLogging(true);

        $sequence->getMaxNumbers();

        $this->markTestSkipped('Logging test case with wrong count');
    }

    private function getDigits(int $length)
    {
        while ($length > 0) {
            yield mt_rand();
            --$length;
        }
    }
}