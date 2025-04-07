<?php

// app/Models/DetailBookingSparepart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBookingSparepart extends Model
{
    use HasFactory;

    protected $table = 'detail_booking_spareparts';

    protected $fillable = [
        'detail_booking_id',
        'sparepart_id',
        'quantity',
        'total_price',
    ];

    // public function detailBooking()
    // {
    //     return $this->belongsTo(DetailBooking::class, 'detail_booking_id');
    // }

    // public function sparepart()
    // {
    //     return $this->belongsTo(Sparepart::class, 'sparepart_id');
    // }
}
