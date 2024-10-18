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
        Schema::create('pokemon', function (Blueprint $table) {
                $table->string('name');
                $table->string('species');
                $table->string('primary_type');
                $table->decimal('weight',);
                $table->integer('height');
                $table->integer('hp');
                $table->integer('attack');
                $table->integer('defense');
                $table->boolean('is_legendary');
                $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
