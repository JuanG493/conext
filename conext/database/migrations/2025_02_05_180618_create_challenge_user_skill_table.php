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
        Schema::create('challenge_user_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('challenge_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->integer('puntos')->default(0); // Puntos otorgados en esta habilidad por el reto
            // $table->timestamps();

            // Clave foránea compuesta para asegurar que (challenge_id, user_id) exista en challenge_user
            $table->foreign(['challenge_id', 'user_id'])
                ->references(['challenge_id', 'user_id'])
                ->on('challenge_user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_user_skill');
    }
};
