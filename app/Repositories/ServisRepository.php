<?php

namespace App\Repositories;

use App\Interfaces\PemakaianInterface;
use App\Interfaces\ServisInterface;
use App\Models\VehicleService;
use App\Models\VehicleUsage;
use Illuminate\Support\Facades\Auth;

class ServisRepository implements ServisInterface
{
    private $service;
    function __construct(VehicleService $service)
    {
        $this->service = $service;
    }

    public function get()
    {
        return $this->service->with(['vehicle'])->where('service_status', 'use')->get();
    }


    public function getHistory()
    {
        return $this->service->with(['vehicle'])->where('service_status', 'done')->get();
    }
}
