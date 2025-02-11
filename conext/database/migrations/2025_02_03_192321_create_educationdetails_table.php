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
        Schema::create('educationdetails', function (Blueprint $table) {
            $table->id();
            $table->string("degree");
            $table->string("field_of_stuty")->nullable();
            $table->string("grade")->nullable();
            $table->longText("description")->nullable();
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educationdetails');
    }
};
