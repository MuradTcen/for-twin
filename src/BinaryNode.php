<?php


namespace Test;


class BinaryNode
{
    public $value;
    public $left = NULL;
    public $right = NULL;

    public function __construct($value)
    {
        $this->value = $value;
    }
}