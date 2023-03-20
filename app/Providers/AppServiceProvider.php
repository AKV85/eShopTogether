<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Sku;
use App\Observers\ProductObserver;
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
//        Ši eilutė prisideda prie tam tikro "Product" modelio stebėjimo priskyrimo "ProductObserver" klasei. Tai
// leidžia "ProductObserver" klasės metodams būti automatiškai iškviečiami, kai vyksta tam tikri "Product" modelio
// veiksmai (pvz., kai yra atnaujinamas arba trinamas įrašas). Tai yra labai naudinga, jei norite automatizuoti tam
// tikrus veiksmus ar vykdyti patikrinimus, kai vykdomi tam tikri modelio veiksmai.
        Sku::observe(ProductObserver::class);
    }
}
