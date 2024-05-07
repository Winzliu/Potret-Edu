<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_id';
    public $incrementing = false;
    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(menu::class, 'menu_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'cart_id',
        'menu_id',
        'user_id',
    ];
}
