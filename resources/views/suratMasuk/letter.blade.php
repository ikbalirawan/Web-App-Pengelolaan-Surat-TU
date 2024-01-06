@extends('layouts.template')

@section('title', 'Data Surat')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Surat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Surat</li>
                </ol>
            </div>
            <div class="card mb-4">
                <div class="d-flex justify-content-start py-2 pl-3"><a href="{{ route('letter.create') }}" class="btn btn-secondary p-2">Tambah Data</a></div>

                <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Tanggal Keluar</th>
                                <th>Penerima Surat</th>
                                <th>Notulis</th>
                                <th>Hasil Rapat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Tanggal Keluar</th>
                                <th>Penerima Surat</th>
                                <th>Notulis</th>
                                <th>Hasil Rapat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($letters as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['letter_code'] }}</td>
                                    <td>{{ $item['name_type'] }}</td>
                                    <td></td>
                                    <td class="d-flex justify-content-center">
                                        <form action="{{ route('suratMasuk.detail', $item['id']) }}" method="GET">
                                            <button class="btn btn-secondary me-3">Lihat</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
