<td class="text-center">
    <div class="d-flex">
        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
            <a href="{{ route('pemesanan.show',$data->id) }}" >
                <button class="btn btn-warning"><i class="bx bx-show-alt mb-1"></i></button>
            </a>
            <form action="{{ route('pemesanan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select id="" name="reservation_status" hidden>
                        <option value="done" selected></option>
                    </select>
                    <button type="submit" class="btn btn-success" {{ $disabled == true ? 'disabled' : ' ' }}>Setujui</button>
            </form>
            <form action="{{ route('pemesanan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select id="" name="reservation_status" hidden>
                        <option value="rejected" selected></option>
                    </select>
                    <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        @endif

        <!-- Manager && Officer -->
        @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
            <!-- Button Setujui -->
            <form action="{{ route('pemesanan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select id="" name="{{ Auth::user()->role_id == 2 ? 'manager_status' : 'officer_status'  }}" hidden>
                    <option value="approved" selected></option>
                </select>
                <button type="submit" class="btn btn-success">Setujui</button>
            </form>
            <!-- Button Tolak -->
            <form action="{{ route('pemesanan.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <select id="" name="{{ Auth::user()->role_id == 2 ? 'manager_status' : 'officer_status'  }}" hidden>
                    <option value="rejected" selected></option>
                </select>
                <button type="submit" class="btn btn-danger">Tolak</button>
            </form>
        @endif
    </div>
</td>
