<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TweetGraderService;
use App\Services\TwitterProfileService;

class GradeController extends Controller
{
    /**
     * @var TweetGraderService
     */
    protected $grader;
    /**
     * @var TwitterProfileService
     */
    protected $profileService;

    public function __construct(TweetGraderService $grader,TwitterProfileService $profileService)
    {
        $this->grader = $grader;
        $this->profileService = $profileService;
    }


    public function show($name)
    {

        try {
            $profile = $this->profileService->load($name);
        }catch (\RuntimeException $e){
            return response([
                'error'=>'Profile not found'
            ],404);
        }
        $this->grader->loadTweets($name);
        $gradedTweets = $this->grader->gradeTweets();

        return [
            'data'=> [
                'grade'=> $this->grader->getTotalScore(),
                'tweets'=>$gradedTweets,
                'profile'=>[
                    'name'=>$profile->getName(),
                    'image'=>$profile->getImage()
]
            ]
        ];
    }
}
