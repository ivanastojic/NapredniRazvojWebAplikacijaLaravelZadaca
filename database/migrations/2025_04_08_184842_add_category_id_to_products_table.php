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
            // Dodajemo kolonu category_id
            $table->unsignedBigInteger('category_id')->nullable(); 

            // Postavljamo strani ključ koji referencira id iz tablice categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Uklanjamo strani ključ
            $table->dropForeign(['category_id']); 

            // Uklanjamo kolonu category_id
            $table->dropColumn('category_id'); 
        });
    }
};
