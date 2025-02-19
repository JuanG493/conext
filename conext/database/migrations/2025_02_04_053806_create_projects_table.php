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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("creator_id")->constrained("users")->onDelete("cascade");
            $table->string("title");
            $table->string('slug')->unique()->nullable();
            $table->longText("description");
            $table->integer("level_required")->default(1);
            $table->enum("status", ["published", "draft", "archived"])->default("draft");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
