<?php

namespace App\Services;

use Thujohn\Twitter\Twitter;

class TwitterProfileService {
    /**
     * @var Twitter
     */
    protected $twitter;
    protected $profile;

    public function __construct(Twitter $twitter)
    {
        $this->twitter = $twitter;
    }

    public function load(string $name) {
        $this->profile = $this->twitter->getUsers(['screen_name'=>$name]);
        return $this;
    }

    public function getName(){
        return $this->profile->screen_name;
    }

    public function getImage(){
        return $this->profile->profile_image_url_https;
    }

}