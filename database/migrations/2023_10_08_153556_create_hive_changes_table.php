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
        Schema::create('hiveChanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hiveId')->constrained('hives');
            $table -> foreignId('apiaryId')->constrained('apiaries');
            $table->foreignId('queenId')->constrained('queens', 'QueenID');
            $table->string('hiveDescription');
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
