<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\UsersInterface;
use App\Models\Role;
use App\Models\User;
use App\Properties\LogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ManajemenPengguna extends Controller
{
    private $user;

    public function __construct(UsersInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {

        if (request()->ajax()) {
            return DataTables::of($this->user->get())
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return view('pages.manajemen-pengguna.partials.action', [
                        'data' => $user,
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.manajemen-pengguna.index', [
            'title' => 'Manajemen Pengguna',
        ]);
    }

    public function create()
    {
        return view('pages.manajemen-pengguna.create', [
            'title' => 'Tambah',
            'roles' => Role::all()->except(Auth::user()->role_id)
        ]);
    }

    public function store(Request $request)
    {
        try {
            // validasi data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'role_id' => 'required',
                'password' => 'required',
            ]);

            $this->user->store($request);
            LogActivity::info('Menambahkan data pengguna');
            return redirect()->route('manajemen-pengguna.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return $e;
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        return view('pages.manajemen-pengguna.edit', [
            'title' => 'Edit',
            'data' => $this->user->edit($id),
            'roles' => Role::all()->except(Auth::user()->role_id)
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            // validasi data
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $id,
            ]);

            $this->user->update($request, $id);
            LogActivity::info('Mengubah data pengguna');
            return redirect()->route('manajemen-pengguna.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            // delete user
            $this->user->destroy($id);
            LogActivity::info('Menghapus data pengguna');
            return redirect()->route('manajemen-pengguna.index')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
