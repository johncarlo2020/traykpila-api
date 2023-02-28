<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    protected $table='reports';

      protected $fillable = [
        'driver_id',
        'passenger_id',
        'ReportStatus',
        'ReportDesc',
        'ReportAction',
        'platenumber',
        'bodynumber',
        'name'
    ];
}
