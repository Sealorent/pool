<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\AktifitasInterface;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Properties\StatusMethod;

class RiwayatAktifitas extends Controller
{
    private $aktifitas;
    public function __construct(AktifitasInterface $aktifitas)
    {
        $this->aktifitas = $aktifitas;
    }
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $aktifitas =  LogActivity::with('user')
                ->when($request->from, function ($query) use ($request) {
                    $query->whereDate('created_at', '>=', $request->from);
                })
                ->when($request->to, function ($query) use ($request) {
                    $query->whereDate('created_at', '<=', $request->to);
                })
                ->get();
            return DataTables::of($aktifitas)
                ->addIndexColumn()
                ->addColumn('method', function ($aktifitas) {
                    return StatusMethod::setStatus($aktifitas->method);
                })
                ->addColumn('created_at', function ($aktifitas) {
                    return date('d-m-Y H:i:s', strtotime($aktifitas->created_at));
                })
                ->addColumn('action', function ($data) {
                    return view('pages.riwayat-aktifitas.partials.action', [
                        'data' => $data,
                    ]);
                })
                ->rawColumns(['action', 'method'])
                ->make();
        }

        return view('pages.riwayat-aktifitas.index', [
            'title' => 'Riwayat Aktifitas',
        ]);
    }

    public function destroy($id)
    {
        try {
            // delete user
            $this->aktifitas->destroy($id);
            return redirect()->route('riwayat-aktivitas.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
