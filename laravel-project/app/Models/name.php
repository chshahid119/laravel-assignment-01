<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = [
        'Fname',
        'Lname',
        'Minit',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class); // One name belongs to one employee
    }
}
