<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_detail_id';
    public $incrementing = false;
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    }

    public function menu()
    {
        return $this->belongsTo(menu::class, 'menu_id');
    }

    protected $fillable = [
        'order_detail_id',
        'order_id',
        'menu_id',
        'quantity',
        'notes',
        'status',
        'menu_status'
    ];
}
