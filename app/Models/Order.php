<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table  = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'dining_option',
        'payment_option',
        'order_note',
        'order_total',
        'order_date_time',
        'order_items',
        'order_status',
    ];
    public $timestamps = true;
}
