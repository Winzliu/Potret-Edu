<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_id';
    public $incrementing = false;
    public $timestamps = false;

    public function historyDetail()
    {
        return $this->hasMany(historyDetail::class, 'history_id');
    }

    protected $fillable = [
        'history_id',
        'cashier_name',
        'waiter_name',
        'table_number',
        'order_status',
        'payment_date',
        'discount'
    ];
}
