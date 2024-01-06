@extends('layouts.template')

@section('title', 'Data Surat')
@section('content')
<style>
    #datatablesSimple {
        width: 100%;
        border-collapse: collapse;
    }

    #datatablesSimple th,
    #datatablesSimple td {
        text-align: center;
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Surat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Surat</li>
                </ol>
            </div>
                <div class="d-flex justify-content-start py-2 pl-3"><a href="{{ route('letter.create') }}" class="btn btn-secondary p-2">Tambah Data</a></div>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1
                            @endphp
                            @if (Auth::check())
                            @foreach ($letters as $i)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $i->letter_type_id }}</td>
                                <td>{{ $i->letter_perihal }}</td>
                                <td>{{ $i->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <ol>
                                        <li>
                                            {{ implode(', ', array_column($i->recipients, 'name')) }}
                                        </li>
                                    </ol>
                                </td>
                                <td>{{ $i->name }}</td>
                                {{-- <td>{{ optional($i->user)->name }}</td> --}}
                                <td>
    
                                @if (Auth::check())
                                    
    
                                    @if (App\Models\Result::where('letter_id', $i->id)->exists())
                                    <a href="{{ route('result.show', $i->id) }}" style="color: limegreen">Sudah Dibuat</a>
                                    @else
                                    @if (Auth::user()->name == optional($i->user)->name)
                                    @if (Auth::user()->role == 'guru')
                                    <a href="{{ route('result.results', $i->id) }}"><button class="btn btn-success text-white">Buat Hasil</button></a>
                                    @endif
                                    @else
                                    <a href="#" style="color: red">Belum Dibuat</a>
                                    @endif
                                    @endif
                          
                                    @else
                                        
                                    @endif
                            </td>
                                <td>
                                        @if (Auth::user()->role == 'staff')
                                        <div class="d-flex">
                                            <a href="{{ route('letter.download-pdf', $i->id) }}"><button class="btn btn-primary text-white me-2">.pdf</button></a>
                                        <a href="{{ route('letter.edit', $i['id']) }}"><button class="btn btn-success text-white me-2">Edit</button></a>
                                        <form action="{{ route('letter.delete', $i->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger text-white">Hapus</button>
                                        </form>     
                                        </div>                           
                                        @endif
                                  
                                    
                                </td>
                            </tr>
                            @endforeach
                            @endif    
                        </tbody>
                    </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

@endsection
