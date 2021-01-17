<?php

namespace App\Models;

use App\Traits\HashableId;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Exceptions\InvalidCurrentPasswordException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Update password if current password is valid
     *
     * @param  \Illuminate\Support\Facades\Auth  $user
     * @param  \App\Http\Requests\PasswordRequest  $request
     * 
     * @throws \App\Exceptions\InvalidCurrentPasswordException
     */
    public static function updatePassword($user, $request)
    {
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
