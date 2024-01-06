@extends('layouts.template')

@section('title', 'Dashboard')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::get('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif
                <h5>Selamat Datang, {{ Auth::user()->name }}</h5>
                <div class="row">
                    @if (Auth::user()->role == 'staff')
                        <div class="col-9">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Surat Keluar</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <i class="bi bi-newspaper"></i>
                                    <p class="small text-white stretched-link"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Klasifikasi Surat</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p class="small text-white stretched-link"><i
                                            class="bi bi-newspaper"></i>{{ $suratCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Data Staff</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">

                                    <p class="small text-white stretched-link"><i
                                            class="bi bi-person"></i>{{ $staffCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body ">Data Guru</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p class="small text-white stretched-link"><i
                                            class="bi bi-person"></i>{{ $guruCount }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->role == 'guru')
                        <div class="col-9">
                            <div class="card bg-white text-secondary mb-4">
                                <div class="card-body ">Surat Masuk</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <p class="small text-secondary stretched-link"><i
                                            class="bi bi-newspaper"></i>{{ $letterCount }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>


@endsection
