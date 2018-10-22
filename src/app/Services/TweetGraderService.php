<?php

namespace App\Services;

use Thujohn\Twitter\Twitter;

class TweetGraderService
{

    /**
     * @var TextGraderService
     */
    protected $grader;
    /**
     * @var Twitter
     */
    protected $twitter;

    protected $tweets;

    protected $totalScore = 0;

    public function __construct(TextGraderService $grader, Twitter $twitter)
    {

        $this->grader = $grader;
        $this->twitter = $twitter;
    }

    public function loadTweets(string $name)
    {
        $this->tweets = $this->twitter->getUserTimeline([
            'screen_name' => $name,
            'count' => config('sloth.tweet_count')
        ]);
        return $this;
    }

    public function gradeTweets() : array
    {

        $tweetScores = [];

        foreach ($this->tweets as $tweet) {
            $score = $this->grader->score($tweet->text);
            if ($score->getScore() === 0) {
                continue;
            }
            $tweetScores[]= $score;
            $this->totalScore += $score->getScore();

        }
        return $tweetScores;
    }

    /**
     * @return int
     */
    public function getTotalScore(): int
    {
        return $this->totalScore;
    }


}