<?php

namespace App\Repositories;

use App\Interfaces\PemakaianInterface;
use App\Models\VehicleUsage;
use Illuminate\Support\Facades\Auth;

class PemakaianRepository implements PemakaianInterface
{
    private $vehicleUsage;
    public function __construct(VehicleUsage $vehicleUsage)
    {
        $this->vehicleUsage = $vehicleUsage;
    }

    public function get()
    {
        return $this->vehicleUsage->with(['vehicle', 'operator'])->where('status', 'use')->get();
    }


    public function getHistory($request)
    {
        return $this->vehicleUsage->with(['vehicle', 'operator'])->where('status', 'done')
            ->when($request->from, function ($query) use ($request) {
                $query->whereBetween('start_date', '>=', $request->from);
            })
            ->when($request->to, function ($query) use ($request) {
                $query->whereBetween('end_date', '<=', $request->to);
            })
            ->get();
    }
}
