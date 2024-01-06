@extends('layouts.template')

@section('title', 'Tambah Klasifikasi Surat')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Klasifikasi Surat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Klasifikasi Surat</li>
                    <li class="breadcrumb-item active">Tambah Klasifikasi Surat</li>
                </ol>
            </div>
            
                <form action="{{ route('letterType.store') }}" method="post" class="card bg-light mt-5 p-5">
                    @csrf
                    @if (Session::get('success'))
                    <div class="alert alert-success"> {{ Session::get('success') }} </div>
                    @endif
                    @if ($errors->any())
                    <ul class='alert alert-danger p-5'>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="mb-3 row">
                      <label for="code" class="col-sm-2 col-form-label">Kode Surat : </label>
                            <input type="number" class="form-control" id="code" name="code">
                        </div>
                
                        <div class="mb-3 row">
                            <label for="klasifikasi" class="col-sm-3 col-form-label">Klasifikasi Surat : </label>
                                  <input type="text" class="form-control" id="klasifikasi" name="klasifikasi">
                              </div>   
                
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
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
