<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $table = "menus";
    protected $primaryKey = "menu_id";
    protected $fillable = [
        'menu_name',
        'category_id',
        'menu_img',
        'menu_description',
        'menu_s_label',
        'menu_l_label',
        'menu_s_price',
        'menu_l_price',
        'menu_status',
        'addons',
    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
