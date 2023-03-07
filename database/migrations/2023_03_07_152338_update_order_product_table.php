<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
//        Šis kodas naudojamas pridėti naują stulpelį į tarpinę lentelę, susijusią su ryšiu tarp Order ir Product
//        modelių. Šiuo atveju naujas stulpelis yra count, kuris saugos produkto kiekį, pridėtą į krepšelį.
        Schema::table('order_product', function (Blueprint $table) {
            $table->integer('count')->default(1)->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropColumn('count');
        });
    }
};
