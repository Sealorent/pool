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
    <div class="row">
        <div class="content-wrapper">
            <div class="card mb-3">
                <div class="card-header">
                    <p><span class="align-middle fs-md-2 fs-4 fw-bold">{{ $title }}</span></p>
                </div>  
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route(Request::segment(1).'.store') }}" method="POST">
                            @csrf
                            <x-select-container name="vehicle_id" id="vehicle_id" label="Kendaraan"  required>
                                <option value="">--Pilih Kendaraan--</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_name }}</option>
                                @endforeach
                            </x-select-container>
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Keterangan Kerusakan</label>
                                <textarea class="form-control" name="service_description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
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
