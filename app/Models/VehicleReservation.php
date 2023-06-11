<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleReservation extends Model
{
    use HasFactory;
    protected $table = 'vehicle_reservation';

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'operator_id',
        'officer_id',
        'manager_id',
        'admin_id',
        'officer_status',
        'officer_description',
        'manager_status',
        'manager_description',
        'reservation_status',
    ];

    /**
     * Get the user that owns the vehicle reservation.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id')->select(['id', 'name']);
    }
    /**
     * Get the user that owns the vehicle reservation.
     */
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id', 'id')->select(['id', 'name']);
    }

    /**
     * Get the user that owns the vehicle reservation.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id', 'id')->select(['id', 'name']);
    }

    /**
     * Get the user that owns the vehicle reservation.
     */
    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id', 'id')->select(['id', 'name']);
    }

    /**
     * Get the vehicle that owns the vehicle reservation.
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
