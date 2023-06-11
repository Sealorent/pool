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
                    <p ><span class="align-middle fs-md-2 fs-4 fw-bold">Tambah {{ $title }}</span></p>
                </div>
                <div class="card-body">
                    <form action="{{ route(Request::segment(1).'.store') }}" method="POST">
                        @csrf
                        <label class="form-label" for="input-group">Nama Operator <small class="text-danger">*</small></label>
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Masukkan Nama Operator"
                                required
                            />
                            <button  class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <p ><span class="align-middle fs-md-2 fs-4 fw-bold">List {{ $title }}</span></p>
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
        let url = '{{ route('operator.destroy', ':id') }}';
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
            {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
@endpush