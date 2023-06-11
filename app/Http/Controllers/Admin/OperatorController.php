<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\UsersInterface;
use App\Models\User;
use App\Properties\GenerateRandom;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OperatorController extends Controller
{

    private $user;

    public function __construct(UsersInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of($this->user->getOperator())
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return view('pages.operator.partials.action', [
                        'data' => $user,
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.operator.index', [
            'title' => 'Operator',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            // validasi data
            $request->validate([
                'name' => 'required',
            ]);

            User::create([
                'name' => $request->name,
                'email' => GenerateRandom::email(),
                'role_id' => 5,
                'password' => bcrypt(GenerateRandom::password()),
            ]);

            return redirect()->route('operator.index')->with('success', 'Berhasil menambahkan data operator');
        } catch (\Exception $e) {
            return redirect()->route('operator.index')->with('error', 'Gagal menambahkan data operator');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('operator.index')->with('error', 'Gagal menambahkan data operator');
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
        return view('pages.operator.edit', [
            'title' => 'Edit',
            'data' => $this->user->edit($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->user->update($request, $id);
            return redirect()->route('operator.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // delete user
            $this->user->destroy($id);
            return redirect()->route('operator.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
