<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('paper_id')->constrained()->onDelete('cascade');
            $table->integer('total_questions');
            $table->integer('correct_answers');
            $table->integer('wrong_answers');
            $table->decimal('obtained_marks', 8, 2);
            $table->decimal('total_marks', 8, 2);
            $table->decimal('percentage', 5, 2);
            $table->timestamps();
            
            // One result per student per paper - prevent multiple submissions
            $table->unique(['user_id', 'paper_id']);
            
            // Add indexes for better query performance
            $table->index('user_id');
            $table->index('paper_id');
            $table->index('percentage');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};