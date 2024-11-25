@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
<!-- Menambahkan CSS langsung di sini -->
<style>
    body {
        background-color: #f3e5f5;
        color: #4a148c;
    }

    .btn-primary {
        background-color: #ce93d8;
        border: none;
    }

    .btn-primary:hover {
        background-color: #ba68c8;
    }

    .btn-success {
        background-color: #81c784;
        border: none;
    }

    .btn-success:hover {
        background-color: #66bb6a;
    }

    .form-label {
        color: #6a1b9a;
    }

    .form-control {
        border-color: #ce93d8;
    }

    .form-control:focus {
        border-color: #ba68c8;
        box-shadow: 0 0 5px rgba(186, 104, 200, 0.5);
    }

    .breadcrumb {
        background-color: #f8f3fa;
    }

    .breadcrumb .breadcrumb-item a {
        color: #6a1b9a;
    }

    .breadcrumb .breadcrumb-item.active {
        color: #4a148c;
    }

    footer {
        background-color: #f8f3fa;
        color: #4a148c;
    }
</style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Penerbit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Create Data Penerbit</li>
                    </ol>
                    <form action="{{ route('action.createpenerbit') }}" class="row my-4 gap-3" method="post">
                        @csrf
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="nama" class="form-label">Nama Penerbit</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="alamat" class="form-label">Alamat Penerbit</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="notelp" class="form-label">No Telp Penerbit</label>
                            <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukkan notelp penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="email" class="form-label">Email Penerbit</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email penerbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <button class="btn btn-success" type="submit">Tambahkan</button>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </form>
                </div>
            </main>
            @include('template.footer')
        </div>
    </div>
@endsection
