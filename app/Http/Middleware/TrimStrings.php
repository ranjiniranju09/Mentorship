<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
<<<<<<< HEAD
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
=======
     * @var array
     */
    protected $except = [
>>>>>>> 0c87cc8 (mentor2)
        'password',
        'password_confirmation',
    ];
}
