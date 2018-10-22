<?php

namespace App\Model;

class TextScore {
    public $text;
    public $score=0;
    public $phrases=[];

    public function __construct(string $text, int $score = 0, array $phrases=[])
    {
        $this->text = $text;
        $this->score = $score;
        $this->phrases = $phrases;
    }

    public function addPhrase(string $phrase){
        $this->score+=1;
        $this->phrases[]=$phrase;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return array
     */
    public function getPhrases(): array
    {
        return $this->phrases;
    }


}