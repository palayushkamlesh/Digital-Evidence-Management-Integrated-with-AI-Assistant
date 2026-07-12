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
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
             $table->string('case_number', 50)->unique();
            $table->string('title');
            $table->text('description')->nullable();

            $table->enum('priority', [
                'Low',
                'Medium',
                'High'
            ])->default('Low');

            $table->enum('status', [
                'Open',
                'Investigating',
                'Resolved',
                'Closed'
            ])->default('Open');
            
            $table->string('created_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};
