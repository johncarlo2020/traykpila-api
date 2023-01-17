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
        'terminal_id',
        'tricycle_id',
        'passenger_lat',
        'passenger_lng',
        'passenger_location',
        'driver_lng',
        'driver_lng',
        'passenger_count',
        'status', 
    ];
}
