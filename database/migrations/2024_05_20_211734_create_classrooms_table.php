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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('description', 100);
            $table->string('location', 100);
            $table->integer('capacity');
            $table->integer('building_id');
            $table->char('order_id', 1);
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
        Schema::dropIfExists('classrooms');
    }
};
