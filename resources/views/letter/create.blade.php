@extends('layouts.template')

@section('title', 'Tambah Data Surat')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Surat</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Surat</li>
                    <li class="breadcrumb-item active">Tambah Data Surat</li>
                </ol>
            </div>
            {{-- Trix Editor --}}
            <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
            <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
            <link rel="stylesheet" type="text/css" href="../../class/dashboard">
            <link rel="stylesheet" type="text/css" href="../../css/javascript">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('letter.store') }}" class="card p-4 mt-5 d-flex" method="POST">
                        @csrf
                        {{-- Menampilkan error validasi --}}
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        {{-- Menampilkan message dari controller with namanya failed --}}
                        @if (Session::get('failed'))
                            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                        @endif

                        @if (Session::get('logout'))
                            <div class="alert alert-primary">{{ Session::get('logout') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 mx-1">
                                    <label for="perihal" class="form-label col-2">Perihal</label>
                                    <input type="text" name="perihal" id="perihal" class="form-control">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 mx-1">
                                    <label for="klasifikasi" class="form-label col-6">Klasifikasi Surat</label>
                                    <select id="klasifikasi" class="form-control" name="klasifikasi">
                                        <option disabled hidden selected>Pilih</option>
                                        @foreach ($letterType as $i)
                                            <option value="{{ $i->id }}">{{ $i->name_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label mt-2">Isi Surat</label>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                        </div>

                        <table>
                            <tr>
                                <th>Nama</th>
                                <th>Peserta (Ceklist jika "ya")</th>
                            </tr>
                            @foreach ($users->where('role', 'guru') as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-scheck-input" name="recipients[]"
                                                id="recipients" value="{{ $user->id }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <tr>

                        </tr>
                        <label for="lampiran" class="mt-4">Lampiran</label>
                        <input type="file" name="lampiran" id="lampiran">
                        <div class="mt-3 mx-1">
                            <select id="notulis" class="form-control" name="notulis">
                                <option disabled hidden selected>Pilih</option>
                                @foreach ($users->where('role', 'guru') as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary px-5">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    {{-- Trix Editor --}}
    <script type="text/javascript" src="../../js/trix.js"></script>
@endsection
