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
        Schema::create('istjobs', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('location');
            $table->string('description');
            $table->enum('category', ['Cyber Security', 'Software Development']);
            $table->string('position');
            $table->integer('experience');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('istjobs');
    }
};
