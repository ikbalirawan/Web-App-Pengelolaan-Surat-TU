@extends('layouts.template')

@section('title', 'Data Klasifikasi Surat')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Klasifikasi Surat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Klasifikasi Surat</li>
                </ol>
                <h3 class="text-primary">{{ $letter->letter_code }}<span class="text-secondary"> | {{ $letter->name_type }}</span></h3>
            </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card bg-white text-white mb -4" style="width: 20rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <h4 class="text-primary justify-content-start">{{ $letter->name_type }}</h4>
                                    </div>
                                    <div class="col-1">
                                        <a href="{{ route('letterType.download-pdf', $letter['id']) }}" class="justify-content-end"><i class="bi bi-download"></i></a>
                                    </div>
                            </div>
                                <p class="text-secondary">23 Dec 2023</p>
                                @foreach ($user as $item)
                                <ol>
                                    <li class="text-secondary"> {{ $item->name }}</li>
                                </ol>
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

@endsection
