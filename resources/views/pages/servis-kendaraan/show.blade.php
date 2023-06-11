@extends('layouts.main')

@section('title', $title )

<style>
    <style>
    .is-invalid {
        border-color: red !important;
    }

    .is-valid {
        border-color: green !important;
    }

</style>
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
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <p><span class="align-middle fs-md-2 fs-4 fw-bold">{{ $title }}</span></p>
                    </div>  
                    <div class="card-body">
                        <div class="row">
                            <form>
                                <x-input-container name="operator" id="operator" label="Nama Operator" value="{{ $data->operator->name }}" disabled/>
                                <x-input-container name="vehicle" id="vehicle" label="Nama Kendaraan" value="{{ $data->vehicle->vehicle_name }}" disabled/>
                                <x-input-container name="vehicle" id="vehicle" label="Jenis Kendaraan" value="{{ ucwords(str_replace('_', ' ', $data->vehicle->vehicle_type)) }}" disabled/>
                                <x-input-container name="vehicle" id="vehicle" label="Petugas Input" value="{{ $data->admin->name }}" disabled/>
                                <input type="text" name="admin_id" id="" value="{{ Auth::user()->id }}" hidden>
                                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Kembali</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header"><p><span class="align-middle fs-md-3 fs-4 fw-bold">Manajer</span></p></div>
                    <div class="card-body">
                        <x-input-container name="manager" id="manager" label="Nama Manajer" value="{{ $data->manager->name }}" disabled/>
                        <p>Status Persetujuan: {!! App\Properties\StatusReservation::setStatus($data->manager_status)!!}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><p><span class="align-middle fs-md-3 fs-4 fw-bold">Officer</span></p></div>
                    <div class="card-body">
                        <x-input-container name="manager" id="manager" label="Nama Officer" value="{{ $data->officer->name }}" disabled/>
                        <p>Status Persetujuan: {!! App\Properties\StatusReservation::setStatus($data->officer_status)!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('includes.alert')
@push('after-script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endpush