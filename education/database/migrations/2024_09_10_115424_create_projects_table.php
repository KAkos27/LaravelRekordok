<?php

use App\Models\Project;
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('costs');
            //days
            $table->integer('time');
            $table->foreignId('manager_id')->references('id')->on('users');
            $table->timestamps();
        });

        Project::create([
            "name" => "takarítás",
            "costs" => 12400,
            "time" => 5,
            "manager_id" => 1,
        ]);

        Project::create([
            "name" => "felmosás",
            "costs" => 5000,
            "time" => 2,
            "manager_id" => 1,
        ]);

        Project::create([
            "name" => "ebéd készítés",
            "costs" => 6700,
            "time" => 2,
            "manager_id" => 3,
        ]);

        Project::create([
            "name" => "olajcsere",
            "costs" => 5600,
            "time" => 1,
            "manager_id" => 3,
        ]);

        Project::create([
            "name" => "rendrakás",
            "costs" => 1200,
            "time" => 8,
            "manager_id" => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
