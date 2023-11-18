<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class UserService {

    public static function getUserIdFromSession(): string
    {
        if (Session::exists('user_id')) {
            return Session::get('user_id');
        }

        $user_id = fake()->uuid();

        Session::put('user_id', $user_id);

        return $user_id;
    }
}