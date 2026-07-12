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
        Schema::create('evidences', function (Blueprint $table) {
            $table->id();
            $table->string('evidence_number')->unique();
            $table->bigInteger('cases_id');
            $table->bigInteger('evidencetypes_id');
            $table->string('title');
            
            $table->enum('status', [
            'Collected',
            'Under Analysis',
            'Archived'
            ])->default('Collected');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidences');
    }
};

