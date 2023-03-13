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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
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

//    public function handle(Request $request, Closure $next): Response|RedirectResponse
//    {
//        // Nustatom fallback locale
//        app()->setFallbackLocale('en');
//
//        // Paimam is seseijos lokale, o jei nera, tai is config/app.php
//        $locale = $request->session()->get('lang', config('app.locale'));
//
//        // Jei yra lang parametras, tai pakeiciam locale
//        if ($request->has('lang')) {
//            $locale = $request->get('lang');
//            $request->session()->put('lang', $locale);
//        }
//
//        // Nustatom locale
//        app()->setLocale($locale);
//
//        return $next($request);
//    }
}
