<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin

//$request - objektas, kuris saugo informaciją apie gautą užklausą.
//$next - funkcija, kuri atlieka sekančius žingsnius apdorojant užklausą.
//Ši funkcija grąžina rezultatą, kuris gali būti naudojamas tolimesniam apdorojimui arba siunčiamas atgal į klientą.
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
//Ši funkcija yra Laravel tarpinės grandinės (middleware) funkcija, kuri patikrina, ar prisijungęs vartotojas yra
// administratorius.
//Funkcija naudoja Laravel Auth klasės statinę funkciją user() tam, kad gautų informaciją apie prisijungusį vartotoją.
// Toliau funkcija patikrina, ar prisijungusio vartotojo rolė yra administratorius naudojant isAdmin() metodą.
//Jei prisijungusio vartotojo rolė nėra administratorius, funkcija išsaugo informacinį pranešimą "Neturite
// administratoriaus teisių" sesijoje ir nukreipia vartotoją į nurodytą maršrutą (index).
//Ši funkcija yra naudojama tarpinių apdorojimo grandinėje, kad būtų užtikrinta, jog tik administratoriai gali
// pasiekti tam tikras svetainės dalis ar atlikti tam tikrus veiksmus.

        public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->isAdmin()) {
            session()->flash('warning', 'Neturite administratoriaus teisių');
            return redirect()->route('index');
        }

        return $next($request);
    }
}
