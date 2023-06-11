<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ServisInterface;
use App\Models\VehicleService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatServis extends Controller
{
    private $vehicleService;

    function __construct(ServisInterface $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $servis = $this->vehicleService->getHistory();
            $servis = VehicleService::with('vehicle')
                ->when($request->from, function ($query) use ($request) {
                    $query->whereDate('created_at', '>=', $request->from);
                })
                ->when($request->to, function ($query) use ($request) {
                    $query->whereDate('created_at', '<=', $request->to);
                })
                ->get();
            return DataTables::of($servis)
                ->addIndexColumn()
                ->addColumn('action', function ($servis) {
                    return view('pages.servis-kendaraan.partials.action', [
                        'data' => $servis,
                    ]);
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.riwayat-servis.index', [
            'title' => 'Riwayat Servis',
        ]);
    }
}
