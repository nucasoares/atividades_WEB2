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

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chave estrangeira para o usuário
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // Chave estrangeira para o livro
            $table->text('comment'); // Texto do comentário
            $table->timestamps(); // Campos created_at e updated_at
        });
        // Schema::create('comments', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
