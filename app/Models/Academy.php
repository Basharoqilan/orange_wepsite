<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;

// app/Models/Academy.php

protected $fillable = [
    'name',
    'governate',
    'picture', // Add this
];


    public function cohorts()
    {
        return $this->hasMany(Cohort::class);
    }
}
