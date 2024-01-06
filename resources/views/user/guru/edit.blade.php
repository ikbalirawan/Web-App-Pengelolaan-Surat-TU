@extends('layouts.template')

@section('title', 'Edit Guru')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Guru</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Guru</li>
                    <li class="breadcrumb-item active">Tambah Guru</li>
                </ol>
            </div>
                <form action="{{ route('account.update-guru', $user['id']) }}" method="post" class="card p-5">
                    @csrf
                    @method('PATCH')
            
                    @if ($errors->any())
                    <ul class="alert alert-danger p-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
            
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama : </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">email : </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Ubah Password : </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password">
                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
                </form>
    </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

@endsection
