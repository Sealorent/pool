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
                        <form action="{{ route(Request::segment(1).'.update', $data->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <x-input-container type="text" id="name" name="name" label="Nama Operator" value="{{ old('name',$data->name) }}" placeholder="Masukkan Nama Pegawai" />
                            <x-input-container type="text" id="email" name="email" label="Email Operator" value="{{ old('email', $data->email) }}" placeholder="Masukkan Email Pegawai" />
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- confirm password -->
<script>
    $(document).ready(function() {
        $('#password_confirmation').on('keyup', function() {
            var password = $('#password').val();
            var confirmPassword = $(this).val();
            // check length password and confirmation password
            if(password.length == confirmPassword.length){
                if (password !== confirmPassword) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                    $('#invalid-feedback').removeClass('d-none').addClass('d-block');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                    $('#invalid-feedback').removeClass('d-block').addClass('d-none');
                }
            }else if(confirmPassword.length > password.length){
                $(this).removeClass('is-valid').addClass('is-invalid');
                $('#invalid-feedback').removeClass('d-none').addClass('d-block');
            }else if(confirmPassword.length > 4){
                $(this).removeClass('is-invalid').addClass('is-valid');
                $('#invalid-feedback').removeClass('d-block').addClass('d-none');
                
            }
        });
        
    });
</script>