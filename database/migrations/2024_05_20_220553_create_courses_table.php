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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('major_id');
            $table->unsignedInteger('semester_id');
            $table->unsignedInteger('area_id');
            $table->string('code', 6);
            $table->integer('teoric_hours');
            $table->integer('practice_hours');
            $table->integer('credits');
            $table->string('character', 20);
            $table->unsignedInteger('study_plan_id');
            $table->string('name', 150);
            $table->integer('total_hours');
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
        Schema::dropIfExists('courses');
    }
};
