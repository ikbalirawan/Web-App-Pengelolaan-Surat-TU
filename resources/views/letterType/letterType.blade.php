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
            </div>
            <div class="card mb-5">
                <div class="d-flex justify-content-start py-2">
                    <a href="{{ route('letterType.create') }}" class="btn btn-primary p-2 me-2">Tambah Data</a>
                    <a href="{{ route('letterType.download-excel') }}" class="btn btn-info p-2">Export Klasifikasi Surat</a>
            </div>

                <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Surat</th>
                                <th>Klasifikasi Surat</th>
                                <th>Surat Tertaut</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Surat</th>
                                <th>Klasifikasi Surat</th>
                                <th>Surat Tertaut</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($letters as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['letter_code'] }}-{{ $item['id'] }}</td>
                                    <td>{{ $item['name_type'] }}</td>
                                    <td>{{ $item['letter_count'] }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-center">
                                    <form action="{{ route('letterType.detail', $item['id']) }}" method="GET">
                                        <button class="btn btn-secondary me-3">Lihat</button>
                                    </form>
                                        <a href="{{ route('letterType.edit', $item['id']) }}"
                                            class="btn btn-primary me-3">Edit</a>
                                            <form action="{{ route('letterType.delete', $item['id']) }}" method="post">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
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
