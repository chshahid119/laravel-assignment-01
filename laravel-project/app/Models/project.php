<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $primaryKey = 'Number'; // Use Number as the primary key

    protected $fillable = [
        'Name',
        'Location',
        'department_id', // Foreign key to Department (id)
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id'); // N-to-1 with Department (foreign key: department_id)
    }

    public function workers()
    {
        return $this->belongsToMany(Employee::class, 'works_on', 'Project_Number', 'Employee_Ssn')
                ->withPivot('Hours'); // N-to-M with Employee through WorksOn (including Hours)
    }
}
