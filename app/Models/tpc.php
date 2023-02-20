<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpc extends Model
{
    protected $table='tpc';

      protected $fillable = [
        'id',
        'tpcstatus',
        'wallet',
        'cashin',
        'cashout',
        'farein',
        'fareout',
        'driver_id',
        'passenger_id',
        
    ];
}
