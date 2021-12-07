<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUserInformationRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getInformation(GetUserInformationRequest $request){

        $from_user = User::where('username', $request->username)->first();

        if (!Hash::check($request->password, $from_user->password)) {
            return "неверный пароль!";
        }

        return new UserResource($from_user);
    }
}
