<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_detail_id';
    public $incrementing = false;
    public $timestamps = false;

    public function history()
    {
        return $this->belongsTo(history::class, 'history_id');
    }

    protected $fillable = [
        'history_detail_id',
        'history_id',
        'menu_name',
        'menu_notes',
        'quantity',
        'price'
    ];
}
