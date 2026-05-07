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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->after('id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_seller_id')->after('category_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('total_sold')->default(0)->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_seller_id']);
            $table->dropColumn([
                'category_id',
                'product_seller_id',
                'total_sold',
            ]);
        });
    }
};
