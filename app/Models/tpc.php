<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpc extends Model
{
    protected $table='tpc';

      protected $fillable = [
        'id',
        'amount',
        'account_number',
        'account_name',
        'reference_number',
        'image',
        'type',
        'status',
        'users_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }


}
