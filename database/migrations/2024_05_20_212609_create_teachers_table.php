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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('last_name_father', 20);
            $table->string('last_name_mother', 20);
            $table->date('birthdate');
            $table->string('email', 50)->unique();
            $table->string('phone', 10);
            $table->string('address', 128);
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('teachers');
    }
};
