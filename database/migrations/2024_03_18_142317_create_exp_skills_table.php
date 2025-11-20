<?php

use App\Models\Experience;
use App\Models\Skill;
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
        Schema::create('exp_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(Experience::class);
            $table->foreignIdFor(Skill::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exp_skills');
    }
};
