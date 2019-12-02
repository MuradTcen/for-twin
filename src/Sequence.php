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
        $result = [];

        $minOfResult = null;

        foreach ($this->digits as $digit) {
            if (count($result) < $this->countOfNumbers) {
                $result [] = $digit;

                if ($this->logging) Logger::info("Added new value: {$digit}");

                if (count($result) === $this->countOfNumbers) {
                    sort($result);
                }
            } elseif ($digit > $result[0]) {
                unset($result[0]);

                $result[] = $digit;

                if ($this->logging) Logger::info("Replaced value: {$minOfResult}, added new value: {$digit}");

                sort($result);
            }
        }

        if ($this->logging and count($result) !== $this->countOfNumbers) {
            Logger::info("Wrong count of numbers, expected count: {$this->countOfNumbers}, actual: " . count($result));
        }

        return $result;
    }
}