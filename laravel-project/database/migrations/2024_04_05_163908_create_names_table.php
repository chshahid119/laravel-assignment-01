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
        Schema::create('names', function (Blueprint $table) {
            $table->unsignedBigInteger('Employee_Ssn'); // Foreign key to Employee (Ssn)
            $table->string('Fname', 50);
            $table->string('Lname', 50);
            $table->string('Minit', 1)->nullable();


            $table->foreign('Employee_Ssn')->references('Ssn')->on('employees');

            $table->primary('Employee_Ssn'); // Primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('names');
    }
};
