<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'cohort_id',
        'job_title',
        'company_name',
        'picture'
    ];

    /**
     * Get the cohort that the student belongs to.
     */
    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

    /**
     * Get the job associated with the student.
     * (A student can have one job, but it might not always exist)
     */

}
