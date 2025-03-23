<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    /**
     * Get the Service that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function Detail()
    {
        return $this->belongsTo(DetailBooking::class, 'booking_id', 'id');
    }
    public function Mekanik()
    {
        return $this->belongsTo(User::class, 'mekanik_id', 'id');
    }
    public function CS()
    {
        return $this->belongsTo(User::class, 'cs_id', 'id');
    }
    public function Customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
