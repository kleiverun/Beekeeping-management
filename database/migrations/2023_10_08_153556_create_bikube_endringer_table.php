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
        Schema::create('bikube_endringer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bikube_idBikube')->constrained('bikube', 'id');
            $table->integer('antallSkattekasser');
            $table->integer('estimertStyrke');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bikube_endringer');
    }
};
