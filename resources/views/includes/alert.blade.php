
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: "{{ session()->get('success') }}",
        })
    </script>
@endif
@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: '{{ session()->get('error') }}',
        })
    </script>
@endif
