<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
<<<<<<< HEAD
     * Typically, users are redirected here after authentication.
=======
     * This is used by Laravel authentication to redirect users after login.
>>>>>>> 0c87cc8 (mentor2)
     *
     * @var string
     */
    public const HOME = '/home';

    /**
<<<<<<< HEAD
     * Define your route model bindings, pattern filters, and other route configuration.
=======
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
>>>>>>> 0c87cc8 (mentor2)
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
<<<<<<< HEAD
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
=======
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
>>>>>>> 0c87cc8 (mentor2)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
<<<<<<< HEAD
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
=======
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
>>>>>>> 0c87cc8 (mentor2)
        });
    }
}
