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
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->string('kode_barang')->unique();

            $table->string('nama_barang');

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('harga',12,2);

            $table->integer('stok_total')
                ->default(0);

            $table->integer('stok_minimum')
                ->default(5);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
