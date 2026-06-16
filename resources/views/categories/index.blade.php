<h2>Data Kategori</h2>

<a href="{{ route('categories.create') }}">
Tambah
</a>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nama</th>
</tr>

@foreach($categories as $item)

<tr>

<td>{{ $item->id }}</td>

<td>{{ $item->nama_kategori }}</td>

</tr>

@endforeach

</table>