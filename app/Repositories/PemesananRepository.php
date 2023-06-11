<?php

namespace App\Repositories;

use App\Interfaces\PemesananInterface;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleReservation;
use App\Models\VehicleUsage;
use Illuminate\Support\Facades\Auth;

class PemesananRepository implements PemesananInterface
{
    private $vehicleReservation;
    private $vehicleUsage;
    private $vehicle;
    public function __construct(VehicleReservation $vehicleReservation, VehicleUsage $vehicleUsage, Vehicle $vehicle)
    {
        $this->vehicleUsage = $vehicleUsage;
        $this->vehicleReservation = $vehicleReservation;
        $this->vehicle = $vehicle;
    }

    public function get()
    {
        if (Auth::user()->role_id == 2) {
            return $this->vehicleReservation->where('manager_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->where('manager_status', 'pending')->get();
        } elseif (Auth::user()->role_id == 3) {
            return $this->vehicleReservation->where('officer_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->where('officer_status', 'pending')->get();
        } elseif (Auth::user()->role_id == 5) {
            return $this->vehicleReservation->where('operator_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->get();
        } elseif (Auth::user()->role_id == 1) {
            return $this->vehicleReservation->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->get();
        } elseif (Auth::user()->role_id == 4) {
            return $this->vehicleReservation->where('admin_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->where('reservation_status', 'onprocess')->get();
        }
    }


    public function store($request): bool
    {
        $this->vehicle->find($request->vehicle_id)->update([
            'vehicle_status' => 'dipakai',
        ]);
        $this->vehicleReservation->create($request->except('_token'));
        return true;
    }

    public function update($request, $id): bool
    {
        if ($request->manager_status || $request->officer_status) {
            $this->vehicleReservation->find($id)->update($request->except('_token', '_method'));
        } else {
            $data = $this->vehicleReservation->find($id);

            if ($request->reservation_status == 'rejected') {
                $this->vehicle->find($data->vehicle_id)->update([
                    'vehicle_status' => 'tersedia',
                ]);
            } else {
                $this->vehicleUsage->create([
                    'vehicle_id' => $data->vehicle_id,
                    'operator_id' => $data->operator_id,
                    'vehicle_reservation_id' => $data->id,
                    'start_date' => now(),
                    'status' => 'use'
                ]);
            }

            $this->vehicleReservation->find($id)->update($request->except('_token', '_method'));
        }

        return true;
    }

    public function getHistory($request)
    {
        if (Auth::user()->role_id == 2) {
            return $this->vehicleReservation
                ->where('manager_id', Auth::user()->id)
                ->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])
                ->whereNotIn('manager_status', ['pending'])
                ->when($request->from, function ($query, $request) {
                    $query->whereDate('updated_at', '>=', $request);
                })
                ->when($request->to, function ($query, $request) {
                    $query->whereDate('updated_at', '<=', $request);
                })
                ->get();
        } elseif (Auth::user()->role_id == 3) {
            return $this->vehicleReservation->where('officer_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->whereNotIn('officer_status', ['pending'])
                ->when($request->from, function ($query, $request) {
                    $query->whereDate('updated_at', '>=', $request);
                })
                ->when($request->to, function ($query, $request) {
                    $query->whereDate('updated_at', '<=', $request);
                })->get();
        } elseif (Auth::user()->role_id == 5) {
            return $this->vehicleReservation->where('operator_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])
                ->when($request->from, function ($query, $request) {
                    $query->whereDate('updated_at', '>=', $request);
                })
                ->when($request->to, function ($query, $request) {
                    $query->whereDate('updated_at', '<=', $request);
                })->get();
        } elseif (Auth::user()->role_id == 1) {
            return $this->vehicleReservation->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])
                ->when($request->from, function ($query, $request) {
                    $query->whereDate('updated_at', '>=', $request);
                })
                ->when($request->to, function ($query, $request) {
                    $query->whereDate('updated_at', '<=', $request);
                })->get();
        } elseif (Auth::user()->role_id == 4) {
            return $this->vehicleReservation->where('admin_id', Auth::user()->id)->with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->whereNotIn('reservation_status', ['onprocess'])
                ->when($request->from, function ($query, $request) {
                    $query->whereDate('updated_at', '>=', $request);
                })
                ->when($request->to, function ($query, $request) {
                    $query->whereDate('updated_at', '<=', $request);
                })->get();
        }
    }
}
