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
                            <x-select-container name="operator_id" id="operator_id" label="Operator"  required>
                                <option value="">--Pilih Operator--</option>
                                @foreach ($operators as $operator)
                                    <option value="{{ $operator->id }}">{{ $operator->name }}</option>
                                @endforeach
                            </x-select-container>
                            <x-select-container name="vehicle_id" id="vehicle_id" label="Kendaraan"  required>
                                <option value="">--Pilih Kendaraan--</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_name }}</option>
                                @endforeach
                            </x-select-container>
                            <x-select-container name="officer_id" id="officer_id" label="Officer"  required>
                                <option value="">--Pilih Officer--</option>
                                @foreach ($officers as $officer)
                                    <option value="{{ $officer->id }}">{{ $officer->name }}</option>
                                @endforeach
                            </x-select-container>
                            <x-select-container name="manager_id" id="manager_id" label="Manager"  required>
                                <option value="">--Pilih Manager--</option>
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </x-select-container>
                            <input type="text" name="admin_id" id="" value="{{ Auth::user()->id }}" hidden>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endpush
