@extends('layouts.main')

@section('title', $title )

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
     <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route(Request::segment(1).'.index') }}" >{{ ucwords(Request::segment(1)) }}</a>
                </li>
                <li class="breadcrumb-item fw-bold">
                    <a href="javascript:void(0);" class="fw-bold">{{ $title }}</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="content-wrapper">
            <div class="card mb-3">
                <div class="card-header">
                    <p><span class="align-middle fs-md-2 fs-4 fw-bold">{{ $title }}</span></p>
                </div>  
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('kendaraan.store') }}" method="POST">
                            @csrf
                            <x-input-container type="text" name="vehicle_name" label="Nama Kendaraan" placeholder="Masukkan Nama Kendaraan" required/>
                            <x-select-container name="vehicle_type" label="Tipe Kendaraan"  required>
                                <option value="">--Pilih Tipe Kendaraan--</option>
                                <option value="angkutan_orang">Angkutan Orang</option>
                                <option value="angkutan_barang">Angkutan Barang</option>
                            </x-select-container>
                            <x-select-container name="vehicle_owner" label="Kepemilikan Kendaraan" class="mb-5" required>
                                <option value="">--Pilih Status Kepemilikan--</option>
                                <option value="perusahaan">Milik Perusahaan</option>
                                <option value="sewa">Menyewa</option>
                            </x-select-container>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Kembali</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
    
@include('includes.alert')
@endpush