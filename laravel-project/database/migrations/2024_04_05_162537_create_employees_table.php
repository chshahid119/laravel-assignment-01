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
        Schema::create('employees', function (Blueprint $table) {
            $table->string('Ssn', 11)->primary(); // SSN as primary key (assuming max 11 characters)
            $table->date('Bdate');
            $table->text('Address');
            $table->decimal('Salary', 8, 2);  // Salary with 8 digits, 2 decimal places
            $table->char('Sex', 1);  // Sex with single character

            // Foreign keys
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();

            // Foreign key constraints (assuming departments and employees tables exist)
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('supervisor_id')->references('Ssn')->on('employees');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
