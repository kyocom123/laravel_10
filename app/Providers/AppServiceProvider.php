<?php

namespace App\Providers;

use App\Models\Menu;
use App\Service\MenuService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::custom-pagination');
        
        view()->composer([
            'layouts.app'
        ], function($view) {
            $menuService = app()->make(MenuService::class);
            $menus = Menu::where(['status'=>1, 'deleted'=>0])->orderBy('index')->get();  
            $menus = $menuService->buildTree($menus);          
            view()->share('menus', $menus);
        });
    }
}
