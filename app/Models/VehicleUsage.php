<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleUsage extends Model
{
    use HasFactory;
    protected $table = 'vehicle_usage';

    protected $fillable = [
        'vehicle_id',
        'operator_id',
        'vehicle_reservation_id',
        'start_date',
        'end_date',
        'bbm_consumption',
        'status',
    ];

    /**
     * Get the user that owns the vehicle reservation.
     */
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id')->select(['id', 'name']);
    }

    /**
     * Get the vehicle that owns the vehicle reservation.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    /**
     * Get the vehicle that owns the vehicle reservation.
     */
    public function vehicleReservation()
    {
        return $this->belongsTo(VehicleReservation::class, 'vehicle_reservation_id', 'id');
    }
}
