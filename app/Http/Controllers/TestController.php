<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserInformation;


class TestController extends Controller
{

    public function test()
    {
        $old_img = UserInformation::where('user_id', 10)->first('img');
        return $old_img;
    }

}
