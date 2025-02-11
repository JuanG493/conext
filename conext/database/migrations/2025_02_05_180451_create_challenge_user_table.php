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
        Schema::create('challenge_user', function (Blueprint $table) {
            // $table->id();
            $table->foreignId("challenge_id")->constrained("challenges")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            // $table->enum("status", ["pending", "approved", "rejected"])->default("pending");
            $table->integer("xp_points")->default(0);
            $table->text("feedback")->nullable();
            // $table->dateTime("submitted_at")->nullable();
            $table->primary(["challenge_id", "user_id"]); //asi un usuario solo puede una vez a un reto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenge_user');
    }
};
