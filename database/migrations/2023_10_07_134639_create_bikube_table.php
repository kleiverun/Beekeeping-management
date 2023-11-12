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
        Schema::create('hive', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apiary_idApiary')->constrained('apiary', 'id');
            $table->foreignId('users_id')->constrained('users', 'id');
            $table->integer('antallSkattekasser');
            $table->timestamps();
            $table->string('identifikasjon');
            $table->integer('estimertStyrke');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hive');
    }
};
