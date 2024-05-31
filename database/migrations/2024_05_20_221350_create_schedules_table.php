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
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('study_plan_id');
            $table->unsignedInteger('academic_period_id');
            $table->unsignedInteger('session_dasc_id');
            $table->unsignedInteger('classroom_id');
            $table->unsignedInteger('day_id');
            $table->unsignedInteger('block_id');
            $table->timestamps();

            // This to handle the synchronization of the external database
            $table->integer('original_id')->nullable();
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
