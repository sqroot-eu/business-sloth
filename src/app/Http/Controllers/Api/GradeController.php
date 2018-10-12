<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class GradeController extends Controller
{


    public function show($name)
    {

        return [
            'data'=> ['grade'=> 3]
        ];
    }
}
