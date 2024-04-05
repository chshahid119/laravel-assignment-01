<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorksOn extends Model
{
    use HasFactory;

    public $primaryKey = ['Employee_Ssn', 'Project_Number']; // Define composite primary key

    protected $fillable = [
        'Hours',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_Ssn'); // Belongs to Employee (foreign key: Employee_Ssn)
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'Project_Number'); // Belongs to Project (foreign key: Project_Number)
    }
}
