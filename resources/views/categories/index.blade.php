<h2>Data Kategori</h2>

<a href="{{ route('categories.create') }}">
Tambah
</a>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th colspan="2">Aksi</th>
</tr>

@foreach($categories as $item)

<tr>

<td>{{ $item->id }}</td>

<td>{{ $item->nama_kategori }}</td>

<td>

    <a href="{{ route('categories.edit',$item->id) }}"
       class="btn btn-warning btn-sm">

        Edit

    </a>

    <form
        action="{{ route('categories.destroy',$item->id) }}"
        method="POST"
        class="d-inline">

        @csrf
        @method('DELETE')

        <button
            class="btn btn-danger btn-sm"
            onclick="return confirm('Hapus kategori?')">

            Hapus

        </button>

    </form>

</td>

</tr>

@endforeach

</table>