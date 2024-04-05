<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'Ssn'; // Use SSN as unique identifier

    protected $fillable = [
        'Bdate',
        'Address',
        'Salary',
        'Sex',
    ];

    public function name()
    {
        return $this->hasOne(Name::class); // One employee has one name
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'works_for'); // N-to-1 with Department (foreign key: works_for)
    }

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id'); // One-to-one with another Employee (foreign key: supervisor_id)
    }

    public function supervisees()
    {
        return $this->hasMany(Employee::class, 'supervisor_id'); // N-to-one with other Employees (foreign key: supervisor_id on other employees)
    }

    public function manages() // Optional - One-to-one with Department (through Manages)
    {
        if ($this->isManager()) { // Hypothetical check for manager role
            return $this->hasOne(Department::class, 'Manager_Ssn'); // Adjust foreign key if using Manages table
        }

        return null;
    }

    public function worksOn()
    {
        return $this->hasMany(WorksOn::class); // 1-to-M with WorksOn
    }

    public function dependent()
    {
        return $this->hasOne(Dependent::class); // N-to-1 with Dependent
    }


    private function isManager()
    {
        // Implement logic to check if employee is a manager (replace with your criteria)
    }
}
