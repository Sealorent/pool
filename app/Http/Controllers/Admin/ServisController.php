<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ServisInterface;
use App\Models\Vehicle;
use App\Models\VehicleService;
use App\Properties\LogActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServisController extends Controller
{
    private $vehicleService;

    function __construct(ServisInterface $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }



    public function index()
    {
        if (request()->ajax()) {
            $servis = $this->vehicleService->get();
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
        return view('pages.servis-kendaraan.index', [
            'title' => 'Servis Kendaraan',
        ]);
    }

    public function create()
    {
        return view('pages.servis-kendaraan.create', [
            'title' => 'Tambah',
            'vehicles' => Vehicle::where('vehicle_status', 'tersedia')->get()
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'vehicle_id' => 'required',
            ]);

            Vehicle::where('id', $request->vehicle_id)->update([
                'vehicle_status' => 'perbaikan'
            ]);
            VehicleService::create([
                'vehicle_id' => $request->vehicle_id,
                'service_description' => $request->service_description,
                'start_date' => now(),
            ]);
            LogActivity::info("Menambahkan data servis kendaraan");
            return redirect()->route('servis.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            VehicleService::findOrFail($id)->update([
                'end_date' => now(),
                'service_status' => 'done',
            ]);
            LogActivity::info("Mengubah data servis kendaraan");
            return redirect()->route('servis.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
