<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Permissions;
use View;
use Auth;

class NavigationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // for the admin navigation layout, lets get the menu options available to them from here
        View::composer('layouts.navigation', function ($view) {

            $user = Auth::user();

            // get a list of all the menu options if we are logged in
            if ($user) {
                $options = $this->getOptionList($user);
            } else {
                // this shouldn't really be possible honestly
                $options = [];
            }
            $view->with(['menuOptions' => $options]);
        });
    }

    protected function getOptionList($user)
    {

        // everyone can manage their account
        //$menuOptions = ['My Account'=>'/account'];
        $menuOptions = [];

        // define the other links here
        $permissions = [
            Permissions::EDIT_USERS => ['Users' => 'admin.user.index'],
            Permissions::EDIT_ORGANIZATIONS => ['Organizations' => 'admin.organization.index'],
        ];


        // loop through and add the appropriate links
        foreach ($permissions as $permission => $links) {
            if ($user->can($permission)) {
                foreach ($links as $name => $route) {
                    $menuOptions[$name] = $route;
                }
            }
        }

        return $menuOptions;
    }
}
