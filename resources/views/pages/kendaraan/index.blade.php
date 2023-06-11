@extends('layouts.main')

@section('title', $title )

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
     <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);" class="fw-bold">{{ $title }}</a>
                </li>
                <li class="breadcrumb-item fw-bold">
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="content-wrapper">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <p ><span class="align-middle fs-md-2 fs-4 fw-bold">{{ $title }}</span></p>
                        <div class="col-md-2 text-end">
                            <a href="{{ route($routeCreate) }}" class="btn btn-primary"><i class="bx bx-plus mb-1 me-1"></i>Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-striped">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
@include('includes.modal-delete')
<!-- End Modal Delete -->
@endsection
@push('after-script')

<!-- Alert -->
@include('includes.alert')
<!-- End Alert -->

<script>
    // function modal delete
    function btnDelete(dataId, dataName) {
        $('#modalDelete').modal('show'); 
        let id = dataId;
        let url = '{{ route('kendaraan.destroy', ':id') }}';
        let urlDelete = url.replace(':id', id);
        $('form').attr('action', urlDelete);
    }

    // Datatables
    var datatable = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url()->current() !!}',
            type: 'GET'
        },
        columns: [
            {title:'No', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,},
            {title:'Nama Kendaraan', data: 'vehicle_name', name: 'name'},
            {title:'Tipe Kendaraan', data: 'vehicle_type', name: 'type'},
            {title:'Status Kepemilikan', data: 'vehicle_owner', name: 'owner'},
            {title:'Status Kendaraan', data: 'vehicle_status', name: 'status'},
            {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>

@endpush