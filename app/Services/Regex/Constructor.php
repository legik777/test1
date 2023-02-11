<?php

namespace App\Services\Regex;

use Illuminate\Support\Str;

/**
 * Constructor
 * Class for creating REGEX by serial number mask
 */
class Constructor
{
    /**
     * @var string
     */
    private string $regexMask;

    /**
     * make REGEX by serial number mask
     *
     * @param  string $serialNumberMask
     * @return string
     */
    public function make(string $serialNumberMask):string
    {
        $this->regexMask = "^";
        $this->regexMask  .= Str::swap(
            [
                'N' => '[0-9]+',
                'A' => '[A-Z]+',
                'a' => '[a-z]+',
                'X' => '[A-Z0-9]+',
                'Z' => '[-_@]+',
            ],
            $serialNumberMask
        );
        $this->regexMask .= "$";
        return $this->regexMask;
    }

    /**
     * Get the value of regexMask
     *
     * @return string
     */
    public function getRegexMask(): string
    {
        return $this->regexMask;
    }
}
