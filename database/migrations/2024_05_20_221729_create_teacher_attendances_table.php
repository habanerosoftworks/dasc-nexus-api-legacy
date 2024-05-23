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
            $table->integer('session_id');
            $table->integer('comment_id');
            $table->integer('planning_id');
            $table->integer('teacher_id');
            $table->integer('study_plan_id');
            $table->integer('group_id');
            $table->integer('academic_period_id');
            $table->date('date');
            $table->time('entry_time');
            $table->time('departure_time');
            $table->string('planned_activity', 255);
            $table->integer('advance_id');
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
