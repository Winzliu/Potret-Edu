<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_id';
    public $incrementing = false;
    public $timestamps = false;

    public function cart()
    {
        return $this->hasMany(cart::class, 'menu_id');
    }

    public function menuCategory()
    {
        return $this->belongsTo(menuCategory::class, 'menu_category_id');
    }

    public function orderDetail()
    {
        return $this->hasMany(orderDetail::class, 'menu_id');
    }

    protected $fillable = [
        'menu_id',
        'menu_category_id',
        'menu_name',
        'menu_allergen',
        'menu_description',
        'menu_price',
        'menu_image'
    ];
}
