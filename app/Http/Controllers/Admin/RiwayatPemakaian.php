<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PemakaianInterface;
use App\Models\VehicleUsage;
use App\Properties\GetTotalUsage as PropertiesGetTotalUsage;
use GetTotalUsage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatPemakaian extends Controller
{
    private $pemakaian;
    public function __construct(PemakaianInterface $pemakaian)
    {
        $this->pemakaian = $pemakaian;
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
            $pemakaian = $this->pemakaian->getHistory($request);
            return DataTables::of($pemakaian)
                ->addIndexColumn()
                ->addColumn('bbm_consumption', function ($pemakaian) {
                    return $pemakaian->bbm_consumption != null ? $pemakaian->bbm_consumption . ' Liter' : null;
                })
                ->addColumn('total_pemakaian', function ($pemakaian) {
                    return PropertiesGetTotalUsage::getTotalUsage($pemakaian->start_date, $pemakaian->end_date);
                })
                ->addColumn('action', function ($pemakaian) {
                    return view('pages.riwayat-pemakaian.partials.action', [
                        'data' => $pemakaian,
                    ]);
                })
                ->make(true);
        }

        return view('pages.riwayat-pemakaian.index', [
            'title' => 'Riwayat Pemakaian',
        ]);
    }

    public function show($id)
    {
        return view('pages.riwayat-pemakaian.show', [
            'title' => 'Detail Riwayat Pemakaian',
            'data' => VehicleUsage::with('vehicle', 'operator', 'vehicleReservation', 'vehicleReservation.admin', 'vehicleReservation.manager', 'vehicleReservation.officer')->where('id', $id)->first(),
        ]);
    }
}
