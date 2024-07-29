<?php

class Conversor
{
    private $romanos = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    public function toRoman($number)
    {
        $result = '';
        foreach ($this->romanos as $romano => $value) {
            while ($number >= $value) {
                $result .= $romano;
                $number -= $value;
            }
        }
        return $result;
    }

    public function toDecimal($romano)
    {
        $result = 0;
        $i = 0;
        $roman = strtoupper($romano);
        $length = strlen($roman);

        foreach ($this->romanos as $key => $value) {
            while ($i < $length && substr($roman, $i, strlen($key)) == $key) {
                $result += $value;
                $i += strlen($key);
            }
        }

        return $result;
    }
}
