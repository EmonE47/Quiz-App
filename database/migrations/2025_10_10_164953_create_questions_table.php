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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // Foreign key linking each question to its paper
            $table->foreignId('paper_id')->constrained()->onDelete('cascade');
            
            // Question text and options
            $table->text('question_text');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');

            // Correct answer (a, b, c, or d)
            $table->enum('correct_answer', ['a', 'b', 'c', 'd']);
            
            // Marks assigned to this question
            $table->integer('marks')->default(1);

            // (Optional) user who created the question
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};