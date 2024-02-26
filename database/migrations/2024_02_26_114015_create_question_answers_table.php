<?php
/**
 * Create Question Answer Table
 * Migration script for table 'question_answers'.
 *
 * @author Original Sumesh KV <sumeshvasu@gmail.com>
 *
 * @version 1.0
 */
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
        Schema::create('question_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('question', 1000);
            $table->string('option_a', 500);
            $table->string('option_b', 500);
            $table->string('option_c', 500);
            $table->string('option_d', 500);
            $table->string('answer', 10);
            $table->timestamps();
        });

        /*
         * Schema for foreign key creation
         */
        Schema::table('question_answers', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_answers');
    }
};
