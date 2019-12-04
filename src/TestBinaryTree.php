<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class TestBinaryTree extends TestCase
{
    public function setUp()
    {
        parent::setUp();

    }

    public function testFirstCasePass()
    {
        $tree = new BinaryTree();

        $tree->setExpectedCapacity(4);

        $array = [89, 0, 5, 9, 45, 67, 8, 6, 7];

        foreach ($array as $number) {
            $tree->insert($number);
        }

        $this->assertEquals($tree->getRealCapacity(), 4);
    }

}