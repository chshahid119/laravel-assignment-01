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
        Schema::create('works_on', function (Blueprint $table) {
            $table->string('Employee_Ssn', 11);
            $table->string('Project_Number', 10);
            $table->integer('Hours');

            // Foreign keys to projects and employees
            $table->foreign('Employee_Ssn')->references('Ssn')->on('employees');
            $table->foreign('Project_Number')->references('Number')->on('projects');

            $table->primary(['Employee_Ssn', 'Project_Number']); // Composite primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works_on');
    }
};
