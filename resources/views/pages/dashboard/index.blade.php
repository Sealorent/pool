@extends('layouts.main')

@section('title', 'Hutang')

@section('content')

@push('after-style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    {{-- <h4 class="fw-bold">DashBoard</h4> --}}
        <div class="row">
            <div class="content-wrapper">
                <!-- Filter Data Hutang -->   
                <div class="card mb-3">
                    <div class="card-header mt-4">
                        <h4 class="text-center">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('after-style')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('after-script')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush