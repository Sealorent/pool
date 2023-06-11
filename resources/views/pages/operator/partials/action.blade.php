<td>
    <div class="d-flex">
        <a href="{{ route('operator.edit',$data->id) }}" class="btn btn-sm btn-warning">
            <i class="bx bx-edit"></i>
        </a>
        <button onclick="btnDelete({{ $data->id}})" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
    </div>
</td>