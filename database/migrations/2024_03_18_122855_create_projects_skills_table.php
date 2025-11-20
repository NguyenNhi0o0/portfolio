<?php

use App\Models\Project;
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
        Schema::create('project_skill', function (Blueprint $table) {

            $table->increments('id');
            $table->foreignIdFor(Project::class);
            $table->foreignIdFor(Skill::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_skill');
    }
};
