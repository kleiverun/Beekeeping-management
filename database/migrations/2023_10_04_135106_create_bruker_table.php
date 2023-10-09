<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bruker', function (Blueprint $table) {
            $table->id('idBruker');
            $table->string('passord');
            $table->string('fornavn');
            $table->string('etternavn');
            $table->string('telefonnr');
            $table->string('epost');
            $table->string('adresse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bruker');
    }
};
