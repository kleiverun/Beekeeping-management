<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apiary_id')->constrained('apiaries');
            $table->foreignId('users_id')->constrained('users');
            $table->unsignedBigInteger('QueensID')->nullable(); // Make the column nullable
            $table->integer('super');
            $table->string('hiveDescription');
            $table->integer('hiveStrength');
            $table->timestamps();

            $table->foreign('QueensID')->references('QueenID')->on('queens')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hives');
    }
};
