<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param   \Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */

//    Middleware gauna užklausą ir užbaigiamąją funkciją (closure).Gauta locale reikšmė iš sesijos yra priskiriama
//kintamajam.Programos kalba nustatoma pagal locale reikšmę, naudojant App::setLocale() metodą.
//Užklausos vykdymas perduodamas toliau į kitą middleware arba kontrolerį naudojant $next($request) funkciją.
    public function handle($request, Closure $next)
    {
        $locale = session('locale');
        App::setLocale($locale);
        return $next($request);
    }
}
