<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login.tampil'); // Ini sesuai route login kamu di web.php
        }

        return null;
    }
}
