<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menambahkan relasi kategori
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            // Informasi produk
            $table->string('sku', 50)->unique();
            $table->string('name', 150);
            $table->text('description')->nullable();

            // Harga produk
            $table->decimal('purchase_price', 15, 2)->default(0);
            $table->decimal('selling_price', 15, 2)->default(0);

            // Persediaan produk
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('minimum_stock')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Menghapus foreign key dan unique index
            $table->dropForeign(['category_id']);
            $table->dropUnique(['sku']);

            // Menghapus kolom yang ditambahkan oleh up()
            $table->dropColumn([
                'category_id',
                'sku',
                'name',
                'description',
                'purchase_price',
                'selling_price',
                'stock',
                'minimum_stock',
            ]);
        });
    }
};
