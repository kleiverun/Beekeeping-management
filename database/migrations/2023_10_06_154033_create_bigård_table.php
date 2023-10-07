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
        Schema::create('bigård', function (Blueprint $table) {
            $table->varchar('idBigård');
            $table->varchar('bruker_idBruker');
            $table->varchar('adresse');
            $table->timestamps('tidLaget');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bigård');
    }
};
