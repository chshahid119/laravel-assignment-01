<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name', // Department name
    ];

    public function manager()
    {
        return $this->hasOne(Employee::class, 'supervisor_id'); // One-to-one with Employee (foreign key: supervisor_id on Employee)
    }

    public function projects()
    {
        return $this->hasMany(Project::class); // N-to-1 with Project
    }
}
