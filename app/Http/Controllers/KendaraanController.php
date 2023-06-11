<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                ->addColumn('action', function ($vehicle) {
                    return view('pages.kendaraan.partials.action', [
                        'data' => $vehicle,
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.kendaraan.index', [
            'title' => 'Kendaraan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
