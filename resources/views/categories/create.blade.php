<h2>Tambah Kategori</h2>

<form
action="{{ route('categories.store') }}"
method="POST">

    @csrf

    <input
    type="text"
    name="nama_kategori">

    <button type="submit">
        Simpan
    </button>

</form>