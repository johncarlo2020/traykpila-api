<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table='license';

    protected $fillable = [
        'id',
        'users_id',
        'front_image',
        'back_image',
        'license_number',
        'expiration'
     
    ];
}
