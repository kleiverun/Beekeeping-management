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
        Schema::create('queens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->unsignedBigInteger('motherQueen')->nullable();
            $table->foreign('motherQueen')
                ->references('id') // Assuming the primary key of the 'queens' table is 'id'
                ->on('queens')
                ->onDelete('cascade');
            $table->date('queenDate');
            $table->string('queenBreed');
            $table->string('queenDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queens');
    }
};
