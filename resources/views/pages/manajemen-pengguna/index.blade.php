@extends('layouts.main')

@section('title', $title )

@section('content')

@push('after-style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-end">
        <nav aria-label="breadcrumb" class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="javascript:void(0);" class="fw-bold">{{ $title }}</a>
                </li>
                <li class="breadcrumb-item">
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
                            <a href="{{ route(Request::segment(1).'.create') }}" class="btn  btn-primary"><i class="bx bx-plus mb-1 me-1"></i>Tambah</a>
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
@endsection
<!-- Modal Delete -->
@include('includes.modal-delete')
<!-- End Modal Delete -->

@push('after-script')

@include('includes.alert')

<script>

    // function modal delete
    function btnDelete(dataId, dataName) {
        $('#modalDelete').modal('show'); 
        let id = dataId;
        let url = '{{ route('manajemen-pengguna.destroy', ':id') }}';
        let urlDelete = url.replace(':id', id);
        $('form').attr('action', urlDelete);
    }

    var datatable = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url()->current() !!}',
            type: 'GET'
        },
        columns: [
            {title:'No', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,},
            {title: 'Nama', data: 'name', name: 'name'},
            {title:'Email', data: 'email', name: 'email'},
            {title:'Jabatan', data: 'role.name', name: 'role'},
            {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
@endpush