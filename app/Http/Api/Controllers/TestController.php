<?php
namespace App\Http\Api\Controllers;

use App\Http\Api\JsonResourses\UserResource;
use App\Http\Controllers\Controller;
use App\Models\User;

class TestController extends Controller
{
    public function test()
    {
        return new UserResource(User::first());
//
//
//        return response()->json([
//            'ok',
//        ], 200);
    }
}
