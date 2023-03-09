<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Šis stulpelis gali būti naudojamas laikyti informaciją apie tai, ar vartotojas yra administratorius, pavyzdžiui,
        // jei jo reikšmė yra 1, tai reiškia, kad vartotojas yra administratorius,
        // o jei 0, tai reiškia, kad vartotojas nėra administratorius.

        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('is_admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
}
