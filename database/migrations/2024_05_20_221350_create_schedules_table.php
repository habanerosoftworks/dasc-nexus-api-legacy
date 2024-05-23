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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id');
            $table->integer('course_id');
            $table->integer('group_id');
            $table->integer('study_plan_id');
            $table->integer('academic_period_id');
            $table->integer('session_id');
            $table->integer('classroom_id');
            $table->integer('day_id');
            $table->integer('block_id');
            $table->timestamps();

            // This to handle the synchronization of the external database
            $table->integer('original_id');
            $table->boolean('was_deleted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
