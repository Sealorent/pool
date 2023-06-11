<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';

    protected $fillable = [
        'vehicle_name',
        'vehicle_type',
        'vehicle_owner',
        'vehicle_status',
    ];
}
