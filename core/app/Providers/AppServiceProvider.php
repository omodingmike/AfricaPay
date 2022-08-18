<?php

namespace App\Providers;


    use App\GeneralSettings;
    use App\Language;
    use App\Menu;
    use App\Social;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;

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
            Schema::defaultStringLength(191);
            $data['general'] = GeneralSettings::first();
            $data['social']  = Social::get();
            $data['menu']    = Menu::get();
            $data['lang']    = Language::all();
            View::share($data);
    }
}
