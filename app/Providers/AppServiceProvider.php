<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
// routeactive: Ši direktyva patikrina, ar dabartinis maršrutas turi nurodytą pavadinimą ir grąžina eilutę,kurią sudaro
// klasės atributas class="active", jei maršrutas yra aktyvus, arba tuščią eilutę, jei maršrutas yra neaktyvus.
        Blade::directive('routeactive', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"active\"' : '' ?>";
        });
//admin: Ši direktyva patikrina, ar dabartinis vartotojas yra prisijungęs ir yra administratorius (pagal isAdmin()
// metodą, kuris yra apibrėžiamas User modelyje) ir grąžina true, jei vartotojas yra administratorius, arba false,
// jei ne. Ši direktyva naudojama Blade šablone, kad būtų galima rodyti tam tikrus elementus tik administratoriams.
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->isAdmin();
        });
    }
}
