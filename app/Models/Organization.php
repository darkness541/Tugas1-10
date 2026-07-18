<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'company', 'lecture_id'];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
}