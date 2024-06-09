<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_detail_id';
    public $incrementing = false;
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone_number']; // Asumsikan kolomnya bernama 'phone'

        // Format nomor telepon: 0812-8888-999
        $formatted_phone = substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);

        return $formatted_phone;
    }
    protected $fillable = [
        'user_detail_id',
        'user_id',
        'name',
        'custom',
        'position',
        'phone_number',
        'employment_date',
        'address',
        'description',
    ];
}