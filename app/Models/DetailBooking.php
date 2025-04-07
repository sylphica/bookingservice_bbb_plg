<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBooking extends Model
{
    use HasFactory;
    protected $table = 'detail_booking';

    protected $casts = [
        'sparepart' => 'array',
    ];

    // public function spareparts()
    // {
    //     return $this->hasMany(DetailBookingSparepart::class, 'detail_booking_id');
    // }
}
