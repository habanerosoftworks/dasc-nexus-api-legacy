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
        Schema::create('teacher_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('session_dasc_id');
            $table->unsignedInteger('comment_id');
            $table->unsignedInteger('planning_id');
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('study_plan_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('academic_period_id');
            $table->date('date');
            $table->time('entry_time');
            $table->time('departure_time');
            $table->string('planned_activity', 255);
            $table->unsignedInteger('advance_id');
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
        Schema::dropIfExists('teacher_attendances');
    }
};
