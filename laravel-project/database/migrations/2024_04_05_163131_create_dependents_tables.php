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
        Schema::create('dependents', function (Blueprint $table) {
            $table->unsignedBigInteger('Employee_Ssn'); // Foreign key to Employee (Ssn)
            $table->string('Name', 50);
            $table->char('Sex', 1);
            $table->date('Birth_date');
            $table->string('Relationship', 20);

            // Foreign key constraint
            $table->foreign('Employee_Ssn')->references('Ssn')->on('employees');

            $table->primary('Employee_Ssn', 'Name'); // Composite primary key (assuming unique name per employee)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents_tables');
    }
};
