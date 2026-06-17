@extends('layouts.app')

@section('content')

<style>

.page-title{
    color:white;
    font-size:32px;
    font-weight:700;
}

.page-subtitle{
    color:#94a3b8;
}

.glass-card{

    background:
    linear-gradient(
        145deg,
        rgba(15,23,42,.85),
        rgba(17,24,39,.75)
    );

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.08);

    border-radius:24px;

    box-shadow:
    0 10px 40px rgba(0,0,0,.45);
}

.form-label{
    color:#d4af37;
    font-weight:600;
}

.form-control{

    background:
    rgba(255,255,255,.05);

    border:
    1px solid rgba(255,255,255,.08);

    color:white;

    border-radius:14px;

    padding:14px 16px;
}

.form-control:focus{

    background:
    rgba(255,255,255,.08);

    color:white;

    border-color:#d4af37;

    box-shadow:
    0 0 0 .2rem rgba(212,175,55,.15);
}

.form-control::placeholder{
    color:#94a3b8;
}

.btn-gold{

    background:#d4af37;

    color:#111827;

    border:none;

    border-radius:12px;

    padding:12px 22px;

    font-weight:600;

    transition:.3s;
}

.btn-gold:hover{

    background:#e4c14c;

    transform:translateY(-2px);
}

.btn-dark-custom{

    background:
    rgba(255,255,255,.05);

    color:white;

    border:
    1px solid rgba(255,255,255,.08);

    border-radius:12px;

    padding:12px 22px;
}

.btn-dark-custom:hover{

    background:
    rgba(255,255,255,.08);

    color:white;
}

.icon-circle{

    width:70px;
    height:70px;

    border-radius:20px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
    rgba(212,175,55,.12);

    color:#d4af37;

    font-size:28px;
}

.category-info{

    background:
    rgba(212,175,55,.08);

    border:
    1px solid rgba(212,175,55,.15);

    border-radius:14px;

    padding:12px 16px;

    color:#d4af37;

    margin-bottom:25px;
}

@media(max-width:768px){

    .page-title{
        font-size:26px;
    }

    .action-group{
        flex-direction:column;
    }

    .action-group .btn{
        width:100%;
    }
}

</style>

<div class="container-fluid">

```
<div class="mb-4">

    <h1 class="page-title">

        Edit Kategori

    </h1>

    <p class="page-subtitle">

        Ubah informasi kategori inventaris

    </p>

</div>

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="glass-card p-4 p-lg-5">

            <div class="text-center mb-4">

                <div
                    class="icon-circle mx-auto mb-3">

                    <i class="bi bi-pencil-square"></i>

                </div>

                <h3 class="text-white">

                    Edit Data Kategori

                </h3>

            </div>

            <div class="category-info">

                <i class="bi bi-hash me-2"></i>

                ID Kategori :
                <strong>{{ $category->id }}</strong>

            </div>

            <form
                action="{{ route('categories.update',$category->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label
                        class="form-label">

                        Nama Kategori

                    </label>

                    <input
                        type="text"
                        name="nama_kategori"
                        value="{{ $category->nama_kategori }}"
                        class="form-control"
                        required>

                </div>

                <div
                    class="d-flex gap-3 action-group">

                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-dark-custom">

                        <i class="bi bi-arrow-left me-2"></i>

                        Kembali

                    </a>

                    <button
                        type="submit"
                        class="btn btn-gold">

                        <i class="bi bi-check-circle me-2"></i>

                        Update Kategori

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
```

</div>

@endsection
    