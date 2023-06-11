<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleService extends Model
{
    use HasFactory;
    protected $table = 'vehicle_service';

    protected $fillable = [
        'vehicle_id',
        'start_date',
        'end_date',
        'service_description',
        'service_status',
    ];

    /**
     * Get the user that owns the vehicle reservation.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }
}
