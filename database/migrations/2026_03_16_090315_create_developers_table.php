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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('dev_name');
            $table->string('email')->unique();
            $table->string('pro_name')->nullable();
            $table->string('role');
            $table->text('assign_projects')->nullable();
            $table->string('github_username')->nullable();
            $table->string('recent_commits')->nullable();
            $table->string('status')->default('Online');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
