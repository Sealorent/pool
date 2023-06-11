@if ( $role == 1 || $role == 4)
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
                {title:'Nama Operator', data: 'operator.name', name: 'name'},
                {title:'Kendaraan', data: 'vehicle.vehicle_name', name: 'name'},
                {title:'Tipe Kendaraan', data: 'vehicle.vehicle_type', name: 'type'},
                {title:'Persetujuan Manager', data: 'manager_status', name: 'manager'},
                {title:'Persetujuan Officer', data: 'officer_status', name: 'officer'},
                {title:'Status Reservasi', data: 'status_reservation', name: 'status'},
                {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ]
        });
</script>
@elseif ($role == 2)
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
                {title:'Nama Operator', data: 'operator.name', name: 'name'},
                {title:'Kendaraan', data: 'vehicle.vehicle_name', name: 'name'},
                {title:'Tipe Kendaraan', data: 'vehicle.vehicle_type', name: 'type'},
                {title:'Persetujuan Manager', data: 'manager_status', name: 'manager'},
                {title:'Persetujuan Officer', data: 'officer_status', name: 'officer'},
                {title:'Status Reservasi', data: 'status_reservation', name: 'status'},
                {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ]
        });
</script>
@elseif ($role == 3)
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
                {title:'Nama Operator', data: 'operator.name', name: 'name'},
                {title:'Kendaraan', data: 'vehicle.vehicle_name', name: 'name'},
                {title:'Tipe Kendaraan', data: 'vehicle.vehicle_type', name: 'type'},
                {title:'Persetujuan', data: 'officer_status', name: 'officer'},
                {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            dom: 'Bfrtip',
            buttons: [
                'excel',
            ]
        });
</script>
@endif