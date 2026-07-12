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
        Schema::create('chain_of_custodies', function (Blueprint $table) {
            $table->id();

    $table->bigInteger('evidences_id');

   $table->bigInteger('from_users_id');

   $table->bigInteger('to_users_id');

    $table->enum('action', [
        'Collected',
        'Transferred',
        'Accessed',
        'Analyzed',
        'Archived'
    ]);

    $table->text('remarks')->nullable();

    $table->timestamp('action_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chain_of_custodies');
    }
};
