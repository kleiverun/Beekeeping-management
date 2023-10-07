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
        Schema::create('bikube', function (Blueprint $table) {
            $table->id('idBikube');
            $table->foreignId('bigård_idBigård')->constrained('bigård');
            $table->foreignId('bruker_idBruker')->constrained('bruker');
            $table->integer('antallSkattekasser');
            $table->timestamps('tidLaget');
            $table->string('identifikasjon');
            $table->integer('estimertStyrke');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikube');
    }
};
