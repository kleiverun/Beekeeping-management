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
            $table->id('QueenID');
            $table->foreignId('UsersID')->constrained('users', 'id');
            $table->date('QueenDate');
            $table->string('QueenBreed');
            $table->string('QueenDescription');
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
