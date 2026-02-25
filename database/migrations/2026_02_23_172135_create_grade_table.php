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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Student::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Subject::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->decimal('T1', 5, 2)->nullable();
            $table->decimal('A1', 5, 2)->nullable();
            $table->decimal('T2', 5, 2)->nullable();
            $table->decimal('A2', 5, 2)->nullable();
            $table->decimal('T3', 5, 2)->nullable();
            $table->decimal('A3', 5, 2)->nullable();
            $table->decimal('T4', 5, 2)->nullable();
            $table->decimal('A4', 5, 2)->nullable();
            $table->decimal('T5', 5, 2)->nullable();
            $table->decimal('A5', 5, 2)->nullable();
            $table->decimal('T6', 5, 2)->nullable();
            $table->decimal('A6', 5, 2)->nullable();
            $table->decimal('FT', 5, 2)->nullable();
            $table->decimal('FA', 5, 2)->nullable();
            $table->decimal('Total', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
