<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'menu_category_id';
    public $incrementing = false;
    public $timestamps = false;

    public function menu()
    {
        return $this->hasMany(menu::class, 'menu_category_id');
    }

    protected $fillable = [
        'menu_category_id',
        'menu_category_name',
    ];
}
