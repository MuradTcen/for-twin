<?php

namespace Test;

use phpDocumentor\Reflection\Types\Iterable_;

class Sequence
{
    /** генератор или массив с интами
     * @var
     */

    private $digits;
    /**
     * @var int
     */

    private $countOfNumbers;
    /**
     * @var bool
     */

    private $logging = false;

    /**
     * MySequence constructor.
     * @param $digits
     * @param int $countOfNumbers
     */
    public function __construct(Iterable $digits, int $countOfNumbers)
    {
        $this->digits = $digits;

        $this->countOfNumbers = $countOfNumbers;
    }

    /**
     * @param bool $logging
     */
    public function setLogging(bool $logging)
    {
        $this->logging = $logging;
    }

    /**
     * @return array|null
     */
    public function getMaxNumbers(): ?array
    {
        $tree = new BinaryTree();

        $tree->setExpectedCapacity($this->countOfNumbers);

        foreach ($this->digits as $digit) {
            if ($this->logging) Logger::info("Added new value: {$digit}");

            $tree->insert($digit);
        }

        return $tree->getArrayValues();
    }
}