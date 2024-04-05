<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $table = 'dependents';

    protected $fillable = [
        'Employee_Ssn', // Foreign key to Employee (SSN)
        'Name',
        'Sex',
        'Birth_date',
        'Relationship',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_Ssn'); // Belongs to Employee (foreign key: Employee_Ssn)
    }
}
