<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';
    public $incrementing = false;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetail()
    {
        return $this->hasMany(orderDetail::class, 'order_id')->orderByRaw("FIELD(menu_status, 'batal', 'selesai', 'masak')");
    }

    protected $fillable = [
        'order_id',
        'user_id',
        'table_number',
        'order_type',
        'order_status'
    ];
}
