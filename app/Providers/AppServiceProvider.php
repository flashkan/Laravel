<?php

namespace App\Providers;

use App\NewsGroup;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->getDropDownMenuCategory();
    }

    /**
     * Get all categories for dropdown menu and send to view "menu".
     */
    public function getDropDownMenuCategory()
    {
        \View::composer('layouts.menu', function ($view) {
            $model = new NewsGroup();
            $group = $model->getAllGroup();
            $view->with('group', $group);
        });
    }
}
