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
        'selective',
    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    // public function toArray()
    // {
    //     $array = parent::toArray();

    //     // Format the prices
    //     if (isset($array['menu_s_price'])) {
    //         $array['menu_s_price'] = number_format($array['menu_s_price'], 2);
    //     }
    //     if (isset($array['menu_l_price'])) {
    //         $array['menu_l_price'] = number_format($array['menu_l_price'], 2);
    //     }

    //     return $array;
    // }
}
