@extends('layouts.template')

@section('title', 'Data Guru')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Guru</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Guru</li>
                </ol>
            </div>
            <div class="card mb-4">
                <div class="d-flex justify-content-start py-2 pl-3"><a href="{{ route('account.create-guru') }}" class="btn btn-secondary p-2">Tambah Data</a></div>

                <div class="card-header">
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Emaik</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['role'] }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="d-flex justify-content-center">
                                        <a href="{{ route('account.edit-staff', $item['id']) }}"
                                            class="btn btn-primary me-3">Edit</a>
                                            <form action="{{ route('account.delete-staff', $item['id']) }}" method="post"
                                            class="d-flex justify-content-end">
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
