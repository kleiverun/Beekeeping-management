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
            $table->foreignId('hive_id')->constrained('hives', 'id');
            $table->foreignId('apiary_id')->constrained('apiaries');
            $table->foreignId('queen_id')->nullable()->constrained('queens');
            $table->string('hiveDescription');
            $table->integer('super');
            $table->integer('hiveStrength');
            $table->timestamps();
        });
    }

    /**ø
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiveChanges');
    }
};
