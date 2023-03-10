<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//Kodas naudojamas patikrinti, ar vartotojas yra administratorius. Funkcija "isAdmin" priklauso vartotojo modeliui ir
// tikrina, ar dabartinio vartotojo objekto "is_admin" savybė yra lygi 1. Jei taip, funkcija grąžina true (tiesa),
// reiškianti, kad vartotojas yra administratorius. Kitu atveju funkcija grąžina false (netiesa). Tokia funkcija dažnai
// naudojama, kai reikia patikrinti, ar vartotojas turi tam tikras privilegijas ar teises, pvz. redaguoti kitų
// vartotojų informaciją, valdyti turinį ir pan.

    public function isAdmin()
    {
        return $this->is_admin === 1;
    }

    //Kodas naudojamas nustatyti ryšį tarp vartotojo ir užsakymų. Funkcija "orders" priklauso vartotojo modeliui ir
    // naudoja "hasMany" metodo funkcionalumą, kad nustatytų ryšį tarp vartotojo ir jo užsakymų. Tai reiškia, kad
    // vienas vartotojas gali turėti daugiau nei vieną užsakymą. Metodas "hasMany" nurodo, kad "User" modelis turi
    // daugiau nei vieną "Order" modelio objektą. "Order::class" naudojama norint nurodyti modelio klasę, su kuria
    // nustatomas ryšys. Tokia funkcija naudojama, kai reikia gauti visus vartotojo užsakymus arba kai reikalinga
    // atlikti tam tikrą veiksmą su visais vartotojo užsakymais.
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
