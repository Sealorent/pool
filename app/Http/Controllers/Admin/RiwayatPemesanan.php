<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PemesananInterface;
use App\Properties\StatusReservation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatPemesanan extends Controller
{
    private $pemesanan;
    public function __construct(PemesananInterface $pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $pemesanan = $this->pemesanan->getHistory($request);
            return DataTables::of($pemesanan)
                ->addIndexColumn()
                ->addColumn('manager_status', function ($pemesanan) {
                    return  StatusReservation::setStatus($pemesanan->manager_status);
                })
                ->addColumn('officer_status', function ($pemesanan) {
                    return StatusReservation::setStatus($pemesanan->officer_status);
                })
                ->addColumn('vehicle.vehicle_type', function ($pemesanan) {
                    return ucwords(str_replace('_', ' ', $pemesanan->vehicle->vehicle_type));
                })
                ->addColumn('status_reservation', function ($pemesanan) {
                    return StatusReservation::setStatus($pemesanan->reservation_status);
                })
                ->addColumn('action', function ($pemesanan) {
                    return view('pages.riwayat-pemesanan.partials.action', [
                        'data' => $pemesanan,
                    ]);
                })
                ->rawColumns(['action', 'manager_status', 'officer_status', 'status_reservation'])
                ->make();
        }
        return view('pages.riwayat-pemesanan.index', [
            'title' => 'Riwayat Pemesanan',
            'role' => auth()->user()->role_id,
        ]);
    }
}
