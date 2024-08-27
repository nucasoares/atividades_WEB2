<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    

    public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();  
        $table->string('title');
        $table->unsignedBigInteger('author_id');  
        $table->unsignedBigInteger('category_id');  
        $table->timestamps();  

        // Definir as chaves estrangeiras
        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};