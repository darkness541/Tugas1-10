<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['keyword'] ?? false, function ($query, $keyword) {
            return $query->where('name', 'like', '%'.$keyword.'%');
        });

        $query->when($filters['department_id'] ?? false, function ($query, $department_id) {
            return $query->where('department_id', $department_id);
        });
    }
}
