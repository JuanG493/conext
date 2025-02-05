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
        Schema::create('proyect_user_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId("project_id");
            $table->foreignId("user_id");
            $table->foreignId("skill_id");
            $table->integer("points");
            $table->timestamps();

            // Clave foránea compuesta para project_user
            $table->foreign(["project_id", "user_id"])
                ->references(["project_id", "user_id"])
                ->on("project_user")
                ->onDelete("cascade");
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
