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
                    <h1 class="mt-4">Rak</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Update Data Rak</li>
                    </ol>
                    <form action="{{ route('rak.update', ['id' => $rak->rak_id]) }}" class="row my-4 gap-3" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="nama" class="form-label">Nama Rak</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama rak" value="{{ $rak->rak_nama }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="tempatlahir" class="form-label">Lokasi Rak</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan lokasi rak" value="{{ $rak->rak_lokasi }}">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="tgllahir" class="form-label">Kapasitas Rak</label>
                            <input type="text" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukkan kapasitas rak" value="{{ $rak->rak_kapasitas }}">
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