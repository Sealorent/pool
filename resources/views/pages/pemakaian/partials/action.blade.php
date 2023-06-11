<td class="text-center">
    <div class="d-flex">
        <button type="button" class="btn btn-danger" data-bs-target="#addData{{ $data->id }}" data-bs-toggle="modal">Akhiri</button>
    </div>
</td>


<!-- modal delete button -->
<div class="modal fade" id="addData{{ $data->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pemakaian.update', $data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pemakaian Kendaraan Berakhir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <x-input-container type="number" step="0.01" name="bbm_consumption" label="Konsumsi BBM" placeholder="Masukkan Juumlah Konsumsi BBM dalam Liter" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
