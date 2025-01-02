<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'applied_jobs';
    protected $primaryKey = 'job_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'job_role',
        'job_description',
        'job_location',
    ];

    public $timestamps = true;
}
