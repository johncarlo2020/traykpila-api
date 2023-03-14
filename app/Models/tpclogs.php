<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpclogs extends Model
{
    use HasFactory;
      protected $table='tpclogs';

      protected $fillable = [
        'cashin',
        'cashout',
        'farein',
        'fareout',
        'tpc_id'

    ];
}