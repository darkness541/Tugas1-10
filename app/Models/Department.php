<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship One to Many dengan Student
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}