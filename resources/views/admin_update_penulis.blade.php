@extends('template.layout')

@if($level == 'admin')
@section('title', 'Daftar Buku - Admin Perpustakaan')
@elseif($level == 'siswa')
@section('title', 'Daftar Buku - Perpustakaan')
@endif

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Penulis</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Update Data Penulis</li>
                    </ol>
                    <form action="{{ route('penulis.update', ['id' => $penulis->penulis_id]) }}" class="row my-4 gap-3" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="nama" class="form-label">Nama Penulis</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penerbit" value="{{ $penulis->penulis_nama }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="tempatlahir" class="form-label">Tempat Lahir Penulis</label>
                            <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Masukkan tempat lahir penulis" value="{{ $penulis->penulis_tempatlahir }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="tgllahir" class="form-label">Tanggal Lahir Penulis</label>
                            <input type="date" name="tgllahir" id="tgllahir" class="form-control" placeholder="Masukkan tanggal lahir penulis" value="{{ $penulis->penulis_tgllahir }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Web Perpustakaan 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection