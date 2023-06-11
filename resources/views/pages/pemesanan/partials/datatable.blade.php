@if ( Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
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
                {title:'Persetujuan Manager', data: 'manager_status', name: 'manager'},
                {title:'Persetujuan Officer', data: 'officer_status', name: 'officer'},
                {title:'Action', data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
</script>
@elseif (Auth::user()->role_id == 2)
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
@elseif (Auth::user()->role_id == 3)
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
</script>
@endif