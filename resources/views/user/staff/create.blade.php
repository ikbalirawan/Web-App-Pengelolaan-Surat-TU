@extends('layouts.template')

@section('title', 'Tambah Staff')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Staff</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Staff</li>
                    <li class="breadcrumb-item active">Tambah Staff</li>
                </ol>
            </div>
            
                <form action="{{ route('account.store-staff') }}" method="post" class="card bg-light mt-5 p-5">
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
                      <label for="name" class="col-sm-2 col-form-label">Nama : </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">email : </label>
                                  <input type="text" class="form-control" id="email" name="email">
                              </div>   
                
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                  </form>

    </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2023</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

@endsection
