<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\PemakaianInterface;
use Illuminate\Http\Request;
use App\Models\VehicleUsage;
use Yajra\DataTables\Facades\DataTables;

class PemakaianController extends Controller
{
    private $pemakaian;
    public function __construct(PemakaianInterface $pemakaian)
    {
        $this->pemakaian = $pemakaian;
    }

    public function index()
    {
        if (request()->ajax()) {
            $pemakaian = $this->pemakaian->get();
            return DataTables::of($pemakaian)
                ->addIndexColumn()
                ->addColumn('bbm_consumption', function ($pemakaian) {
                    return $pemakaian->bbm_consumption != null ? $pemakaian->bbm_consumption . ' Liter' : null;
                })
                ->addColumn('action', function ($pemakaian) {
                    return view('pages.pemakaian.partials.action', [
                        'data' => $pemakaian,
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.pemakaian.index', [
            'title' => 'Pemakaian',
        ]);
    }

    function update(Request $request, $id)
    {
        try {
            VehicleUsage::findOrFail($id)->update([
                'bbm_consumption' => $request->bbm_consumption,
                'end_date' => now(),
                'status' => 'done',
            ]);
            return redirect()->route('pemakaian.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
