<?php

namespace App\Services;

class TextGraderService
{
    protected $paths;
    protected $dictionary = [];

    /**
     * TextGraderService constructor.
     */
    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }


    public function score($text)
    {
        if (!$this->loaded()) {
            $this->load($this->paths);
        }
        $score = 0;
        foreach ($this->dictionary as $term) {
            if (mb_stristr($text, $term)) {
                $score += 1;
            }
        }
        return $score;

    }

    protected function loaded()
    {
        return !empty($this->dictionary);
    }

    public function isBusinessTerm(string $term)
    {
        if (!$this->loaded()) {
            $this->load($this->paths);
        }
        return in_array(mb_strtolower($term), $this->dictionary);
    }

    protected function load(array $paths)
    {
        foreach ($paths as $path) {
            $words = require($path);
            $this->dictionary = array_merge($this->dictionary, $words);
        }
    }
}