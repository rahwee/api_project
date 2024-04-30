<?php

namespace App\Providers;

use App\Exceptions\POSException;
use App\Extensions\TokenToUserProvider;
use App\Models\Language;
use App\Models\Module;
use App\Models\Role;
use App\Models\RoleAccess;
use App\Models\UserRole;
use App\Services\Auth\JwtGuard;
use App\Services\SVRole;
use App\Services\SVuser;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{

    private function getSVRole()
    {
        return new SVuser();
    }

    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Auth::extend('jwt', function ($app, $name) {
			// automatically build the DI, put it as reference
			$userProvider = app(TokenToUserProvider::class);
			$request      = app('request');
            $lang         = $this->getLang();

            App::setLocale($lang);
            return new JwtGuard($userProvider, $request);
		});

        // Setup user permission
        // Gate::define('user_permission', fn($user) => $this->getUserPermission($user));

    }

    // Get user has permission access
    // private function getUserPermission($user)
    // {
    //     return $this->getSVRole()->getPermissionGate($user, $this->getProtectedRouteName());
    // }

    /**
     * Get protected route name and specific with modules
     * @return string
     * */ 
    private function getProtectedRouteName(): string
    {
        $route_name = explode(".", Route::currentRouteName())[0];
        return $route_name;
    }

    /**
     * Get language to set localize
     * */
    private function getLang() : string
    {
        $available = Language::AVAILABLE;
        $lang      = request()->header('accept-language');

        if (strlen($lang) >= 2) {
            $lang = substr($lang, 0, 2);
        }

        $finalCode = $available[$lang] ?? Language::DEFAULT;

        return $finalCode;
    }
}
