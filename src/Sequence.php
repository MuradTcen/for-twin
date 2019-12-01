<?php

namespace Test;

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

    /** Здесь не нравится, что $digits может быть и массивом и генератором,
     * лучше было бы использовать отдельный сеттер для массива и отдельный сеттер для генератора
     * MySequence constructor.
     * @param $digits
     * @param int $countOfNumbers
     */
    public function __construct($digits, int $countOfNumbers)
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

                if ($this->logging) echo "Added new value: {$digit}\n";
            } else {
                if (!$minOfResult) $minOfResult = $this->getMinOfArray($result);

                if ($digit > $minOfResult) {

                    $key = array_search($minOfResult, $result);

                    $result[$key] = $digit;

                    if ($this->logging) echo "Replaced value: {$minOfResult}, added new value: {$digit}\n";

                    $minOfResult = $this->getMinOfArray($result);
                }
            }
        }

        if ($this->logging and count($result) !== $this->countOfNumbers) {
            echo "Wrong count of numbers, expected count: {$this->countOfNumbers}, actual: " . count($result);
        }

        return $result;
    }

    /**
     * @param array $array
     * @return int|null
     */
    private function getMinOfArray(array $array): ?int
    {
        return min($array);
    }
}