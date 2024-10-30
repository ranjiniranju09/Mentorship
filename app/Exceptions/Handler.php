<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
<<<<<<< HEAD
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
=======
     * A list of the exception types that are not reported.
     *
     * @var array
>>>>>>> 0c87cc8 (mentor2)
     */
    protected $dontReport = [
        //
    ];

    /**
<<<<<<< HEAD
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
=======
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
>>>>>>> 0c87cc8 (mentor2)
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
<<<<<<< HEAD
     */
    public function register(): void
=======
     *
     * @return void
     */
    public function register()
>>>>>>> 0c87cc8 (mentor2)
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
