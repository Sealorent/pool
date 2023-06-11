<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Vehicle;
use App\Properties\LogActivity;
use App\Properties\StatusReservation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $vehicle = Vehicle::all();
            return DataTables::of($vehicle)
                ->addIndexColumn()
                ->addColumn('vehicle_type', function ($vehicle) {
                    return ucwords(str_replace('_', ' ', $vehicle->vehicle_type));
                })
                ->addColumn('vehicle_status', function ($vehicle) {
                    return StatusReservation::setStatusVehicle($vehicle->vehicle_status);
                })
                ->addColumn('action', function ($vehicle) {
                    return view('pages.kendaraan.partials.action', [
                        'data' => $vehicle,
                    ]);
                })
                ->rawColumns(['action', 'vehicle_status'])
                ->make(true);
        }

        return view('pages.kendaraan.index', [
            'title' => 'Kendaraan',
            'routeCreate' => 'kendaraan.create'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kendaraan.create', [
            'title' => 'Tambah Kendaraan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            // validasi data
            $request->validate([
                'vehicle_name' => 'required',
                'vehicle_type' => 'required',
                'vehicle_owner' => 'required',
            ]);
            // insert data ke table kendaraan
            Vehicle::insert($request->except('_token'));
            LogActivity::info("Menambahkan Data Kendaraan");
            // redirect ke halaman kendaraan
            return redirect()->route('kendaraan.index')->with('success', "Data Berhasil Dirubah");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.kendaraan.edit', [
            'title' => 'Edit Kendaraan',
            'data' => Vehicle::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $request->validate([
                'vehicle_name' => 'required',
                'vehicle_type' => 'required',
                'vehicle_owner' => 'required',
            ]);
            Vehicle::where('id', $id)->update($request->except('_token', '_method'));
            LogActivity::info("Mengubah Data Kendaraan");
            return redirect()->route('kendaraan.index')->with('success', "Data Berhasil Dirubah");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Vehicle::where('id', $id)->delete();

            return redirect()->route('kendaraan.index')->with('success', "Data Berhasil Dihapus");
            LogActivity::info("Menghapus Data Kendaraan");
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
