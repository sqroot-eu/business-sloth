<?php

namespace Tests\Unit;

use App\Services\TextGraderService;
use Tests\TestCase;

class TextGraderTest extends TestCase
{
    /**
     * @var TextGraderService
     */
    protected $grader;

    protected function setUp()
    {
        parent::setUp();
        $this->grader = new TextGraderService(config('sloth.dictionaries'));
    }

    public function testIsBusinessTermReturnsFalseOnNormalWords()
    {
        $this->assertFalse($this->grader->isBusinessTerm('apples'));
    }

    public function testIsBusinessTermFindsWordsFromMultipleDictionarires()
    {
        $this->assertTrue($this->grader->isBusinessTerm('give a talk'));
        $this->assertTrue($this->grader->isBusinessTerm('acquisition'));
    }

    public function businessTalkGetsScoredCorrectly()
    {
        $this->assertEquals(2, $this->grader->score('I want to address our recent acquisition'));
    }

    public function testTextWithNoBusinessWordsGradesZero()
    {
        $text = 'Non-smoker protip: might be a good idea to find some non-nicotine smokes, just so you could go out for a smoke with that one stubborn colleague and actually get some work done.';
        $this->assertEquals(0, $this->grader->score($text));
    }
}
