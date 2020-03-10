<?php

namespace App\Providers;

use App\Comment;
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
        $this->getComments();
    }

    /**
     * Get all categories for dropdown menu and send to view "menu".
     */
    public function getDropDownMenuCategory()
    {
        \View::composer('layouts.menu', function ($view) {
            $view->with('group', NewsGroup::all());
        });
    }

    /**
     * Get all categories for dropdown menu and send to view "menu".
     */
    public function getComments()
    {
        \View::composer('layouts.comment', function ($view) {
            $view->with('comment', Comment::all());
        });
    }
}
