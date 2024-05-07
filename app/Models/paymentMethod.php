<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentMethod extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_method_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'payment_method_id',
        'method',
        'taxes'
    ];
}
