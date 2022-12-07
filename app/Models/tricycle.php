<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tricycle extends Model
{
    use HasFactory;

    protected $table='tricycles';

      protected $fillable = [
        'name',
        'image',
        'plate_number',
        'body_number',
        'max_passenger',
        'user_id'


    ];
}
