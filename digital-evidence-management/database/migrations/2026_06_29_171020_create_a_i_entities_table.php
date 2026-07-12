<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('ai_entities', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('evidences_id');

        $table->json('persons')->nullable();

        $table->json('dates')->nullable();

        $table->json('amounts')->nullable();

        $table->json('communications')->nullable();

        $table->json('locations')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_i_entities');
    }
};
