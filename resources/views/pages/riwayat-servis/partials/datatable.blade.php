@if ( Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
<script>
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
                    d.from = $('input[name=from]').val();
                    d.to = $('input[name=to]').val();
                }
            },
            columns: [
                {title:'No', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,},
                {title:'Kendaraan', data: 'vehicle.vehicle_name', name: 'name'},
                {title:'Kerusakan', data: 'service_description', name: 'type'},
                {title:'Tanggal Perbaikan', data: 'start_date', name: 'start_date'},
                {title:'Tanggal Selesai', data: 'end_date', name: 'end_date'},
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ]
        });
</script>
{{-- @elseif ($role == 2)
<script>
    var datatable = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url()->current() !!}',
                type: 'GET'
            },
            columns: [
                {title:'No', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,},
                {title:'Nama Operator', data: 'operator.name', name: 'name'},
                {title:'Kendaraan', data: 'vehicle.vehicle_name', name: 'name'},
                {title:'Tipe Kendaraan', data: 'vehicle.vehicle_type', name: 'type'},
                {title:'Persetujuan Officer', data: 'officer_status', name: 'officer'},
                {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
</script>
@elseif ($role == 3)
<script>
    var datatable = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url()->current() !!}',
                type: 'GET'
            },
            columns: [
                {title:'No', data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false,},
                {title:'Nama Operator', data: 'operator.name', name: 'name'},
                {title:'Kendaraan', data: 'vehicle.vehicle_name', name: 'name'},
                {title:'Tipe Kendaraan', data: 'vehicle.vehicle_type', name: 'type'},
                {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
</script> --}}
@endif