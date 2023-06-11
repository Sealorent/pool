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
                    <p><span class="align-middle fs-md-2 fs-4 fw-bold">List {{ $title }}</span></p>
                    <div class="row">
                        <div class="col-md-2">
                            <x-input-container type="date" name="from" id="from"/>
                        </div>
                        <div class="col-md-2">
                            <x-input-container type="date" name="to" id="to"/>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success mt-2" id="search"><i class="bx bx-search"></i>Filter</button>
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

@include('includes.button-datatable')
@include('includes.alert')
<script>

    // function modal delete
    function btnDelete(dataId, dataName) {
        $('#modalDelete').modal('show'); 
        let id = dataId;
        let url = '{{ route('riwayat-aktivitas.destroy', ':id') }}';
        let urlDelete = url.replace(':id', id);
        $('form').attr('action', urlDelete);
    }


    $('#search').on('click', function(){
        // load ajax datatable
        $('#usersTable').DataTable().ajax.reload();

    })
    var datatable = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! url()->current() !!}',
            type: 'GET',
            data: function (d) {
                d.from = $('#from').val();
                d.to = $('#to').val();
            }
        },
        columns: [
            {title:'No', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,},
            {title:'Nama', data: 'user.name', name: 'name'},
            {title:'Keterangan', data: 'subject', name: 'subject'},
            {title:'Method', data: 'method', name: 'method'},
            {title:'URL', data: 'url', name: 'url'},
            {title:'IP', data: 'ip', name: 'ip'},
            {title:'Tanggal', data: 'created_at', name: 'agent'},
            {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    });
</script>
@endpush