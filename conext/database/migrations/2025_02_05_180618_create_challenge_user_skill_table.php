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
            $table->foreignId("challenge_id");
            $table->foreignId("user_id");
            $table->foreignId("skill_id");
            $table->integer("points");
            $table->timestamps();

            // 1. Clave foránea compuesta hacia challenge_user
            $table->foreign(["challenge_id", "user_id"])
                ->references(["challenge_id", "user_id"])
                ->on("challenge_user")
                ->onDelete("cascade");

            // 2. Clave foránea hacia la tabla skills
            $table->foreign("skill_id")
                ->references("id")
                ->on("skills")
                ->onDelete("cascade");
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
