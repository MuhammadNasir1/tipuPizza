<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'supplier';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];

    public $timestamps = true;
}
