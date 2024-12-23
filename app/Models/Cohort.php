<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    use HasFactory;

    protected $fillable = ['academy_id', 'name'];

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    // Define the relationship with Coach
    // public function coaches()
    // {
    //     return $this->hasMany(Coach::class);
    // }

    // Define the relationship with Student
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Define the relationship with Manager
    // public function manager()
    // {
    //     return $this->belongsTo(Manager::class);
    // }
}
