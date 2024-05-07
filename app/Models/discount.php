<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    use HasFactory;

    protected $primaryKey = 'discount_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'discount_id',
        'discount_name',
        'discount_rate'
    ];
}
