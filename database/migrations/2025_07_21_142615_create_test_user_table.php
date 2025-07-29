<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('test_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['not_available', 'in_progress', 'passed', 'failed'])->default('not_available');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_user');
    }
};
