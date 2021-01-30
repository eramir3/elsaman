<?php

namespace App\Services;

use Saman\Utils\Hasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\PasswordRequest;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AuthUserService
{
    public function getAuthUser()
    {
        return Auth::user();
    }

    /**
     * Update password if current password is valid
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * 
     * @throws \App\Exceptions\InvalidCurrentPasswordException
     */
    public static function updatePassword(PasswordRequest $request)
    {
        $user = Auth::user();
        $hashedPassword = $user->password;

        if (Hash::check($request->current_password, $hashedPassword)) 
        {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        else {
            throw new InvalidCurrentPasswordException('Invalid Current Password');
        }
    }
}