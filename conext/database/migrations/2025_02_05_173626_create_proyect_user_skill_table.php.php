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

        Schema::create('project_user_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->foreignId('project_id')->constrained("projects")->onDelete('cascade');
            $table->foreignId('skill_id')->constrained("skills")->onDelete('cascade');
            $table->integer('points')->default(0); // Puntos otorgados en esta habilidad para este proyecto
            $table->timestamps();

            // Clave foránea compuesta que garantiza que (project_id, user_id) exista en project_user
            $table->foreign(['project_id', 'user_id'])
                ->references(['project_id', 'user_id'])
                ->on('project_user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyect_user_skill');
    }
};
