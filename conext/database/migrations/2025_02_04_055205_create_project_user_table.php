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
        Schema::create('project_user', function (Blueprint $table) {
            // $table->id();
            $table->foreignId("project_id")->constrained("projects")->onDelete("cascade");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            // $table->enum("status", ["pending", "approved", "rejected"])->default("pending");
            $table->integer("xp_points")->default(0);
            $table->text("feedback")->nullable();
            $table->dateTime("submitted_at")->nullable();
            $table->primary(["project_id", "user_id"]);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
    }
};
