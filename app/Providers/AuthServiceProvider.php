<?php

namespace App\Providers;

<<<<<<< HEAD
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
=======
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
>>>>>>> 0c87cc8 (mentor2)

class AuthServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
=======
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
>>>>>>> 0c87cc8 (mentor2)
    ];

    /**
     * Register any authentication / authorization services.
<<<<<<< HEAD
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
=======
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
>>>>>>> 0c87cc8 (mentor2)
    }
}
