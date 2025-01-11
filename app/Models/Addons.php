<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    protected $table = "addons";
    protected $primaryKey = "addon_id";
    protected $fillable  = [
        'addon_id',
        'addon_name',
        'addon_price',
        'addon_type',
        'addon_status',
    ];

    public $timestamp = true;
}
