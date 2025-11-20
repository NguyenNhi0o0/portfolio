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
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_exp');
            $table->integer('sta_month')->nullable();;
            $table->integer('sta_year')->nullable();;
            $table->integer('end_month')->nullable();;
            $table->integer('end_year')->nullable();;
            $table->text('description')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
