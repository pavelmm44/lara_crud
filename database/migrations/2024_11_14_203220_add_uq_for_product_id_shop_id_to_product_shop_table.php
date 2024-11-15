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
        Schema::table('product_shop', function (Blueprint $table) {
            $table->unique(['product_id', 'shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_shop', function (Blueprint $table) {
            $table->dropForeign('product_shop_product_id_foreign');
            $table->dropUnique(['product_id', 'shop_id']);
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
};
