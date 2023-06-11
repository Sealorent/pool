<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PemesananInterface;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleReservation;
use App\Properties\LogActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Properties\StatusReservation;

class PemesananController extends Controller
{
    private $pemesanan;
    public function __construct(PemesananInterface $pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    public function index(Request $request)
    {

        if (request()->ajax()) {
            $pemesanan = $this->pemesanan->get($request);
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
                ->addColumn('action', function ($pemesanan) {
                    return view('pages.pemesanan.partials.action', [
                        'data' => $pemesanan,
                        'disabled' => $pemesanan->manager_status == 'approved'  && $pemesanan->officer_status == 'approved' ? false : true,
                    ]);
                })
                ->rawColumns(['action', 'manager_status', 'officer_status'])
                ->make();
        }

        return view('pages.pemesanan.index', [
            'title' => 'Pemesanan',
            'role' => auth()->user()->role_id,
        ]);
    }

    public function create()
    {
        return view('pages.pemesanan.create', [
            'title' => 'Tambah Pemesanan',
            'vehicles' => Vehicle::whereNotIn('vehicle_status', ['dipakai', 'perbaikan'])->get(),
            'officers' => User::where('role_id', 3)->get(),
            'managers' => User::where('role_id', 2)->get(),
            'operators' => User::where('role_id', 5)->get(),
        ]);
    }

    public function store(Request $request)
    {
        try {
            // validate the incoming request
            $request->validate([
                'vehicle_id' => 'required',
                'operator_id' => 'required',
                'officer_id' => 'required',
                'manager_id' => 'required',
            ]);

            $this->pemesanan->store($request);
            LogActivity::info("Menambahkan pemesanan baru");
            return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        return view('pages.pemesanan.show', [
            'title' => 'Detail Pemesanan',
            'data' => VehicleReservation::with(['operator', 'admin', 'officer', 'manager', 'vehicle'])->findOrFail($id),
            'officers' => User::where('role_id', 3)->get(),
            'managers' => User::where('role_id', 2)->get(),
            'operators' => User::where('role_id', 5)->get(),
            'vehicles' => Vehicle::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->pemesanan->update($request, $id);
            LogActivity::info("Mengubah pemesanan");
            return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
