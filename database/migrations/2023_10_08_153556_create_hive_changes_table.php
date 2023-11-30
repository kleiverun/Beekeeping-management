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
        Schema::create('hive_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bikube_idBikube')->constrained('hives', 'id');
            $table->integer('super');
            $table->integer('hiveStrength');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hive_changes');
    }
};
