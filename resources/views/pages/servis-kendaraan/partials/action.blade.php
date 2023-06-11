<td class="text-center">
    <form action="{{ route('servis.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success">Selesai</button>
    </form>
</td>
