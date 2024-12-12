<?php

namespace App\Trait;
use Illuminate\Support\Facades\Auth;

trait AuthCheckTrait
{
    public function authCheck() {
        if (!Auth::check()) {
            return redirect()->route('user.login.form');
        }
    }
}
