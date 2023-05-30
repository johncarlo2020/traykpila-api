<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
      protected $table='bookings';

      protected $fillable = [
        'driver_id',
        'passenger_id',
        'passenger_lat',
        'passenger_lng',
        'destination_lat',
        'destination_lng',
        'driver_lat',
        'driver_lng',
        'passenger_count',
        'payment_type',
        'notes',
        'status',
        'created_at',

    ];
}
