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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->longText('description');
            $table->date('end_date')->default('2024-09-10');
            $table->boolean('status')->default(0);
            //itt ilyen nevű mező (létre is hozom) összekötése egy olyan nevű mezővel abban a táblában
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->timestamps();
        });

        Project::create([
            "title" => "felmosóvíz készítés",
            "description" => "teszt",
            "end_date" => "2024-12-01",
            "status" => 0,
            "user_id" => 1,
            "project_id" => 1
        ]);

        Project::create([
            "title" => "valami",
            "description" => "teszt",
            "end_date" => "2025-11-21",
            "status" => 0,
            "user_id" => 1,
            "project_id" => 1
        ]);

        Project::create([
            "title" => "víz melegítés",
            "description" => "teszt",
            "end_date" => "2025-07-24",
            "status" => 0,
            "user_id" => 2,
            "project_id" => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
