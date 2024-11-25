@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <style>
        body {
            background-color: #f3e5f5; 
            color: #4a148c; 
        }

        .form-control {
            background-color: #f8f3fa; 
            color: #4a148c;
            border: 1px solid #ce93d8; /* Border ungu pastel */
        }

        .form-control:focus {
            border-color: #ba68c8;
            box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, 0.25);
        }

        .btn-success {
            background-color: #ce93d8; 
            border: none;
        }

        .btn-success:hover {
            background-color: #ba68c8; 
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

        .alert-success {
            background-color: #e1bee7; 
            color: #4a148c;
        }

        .alert-success .btn-close {
            color: #4a148c;
        }
    </style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Kategori</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Create Data Kategori</li>
                    </ol>

                    <form action="{{ route('action.createkategori') }}" class="row my-4 gap-3" method="post">
                        @csrf

                        {{-- Form Input --}}
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="nama" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukkan nama kategori">
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <button class="btn btn-success w-100" type="submit">Tambahkan</button>
                        </div>

                        {{-- Alert Notifications --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </form>
                </div>
            </main>
            @include('template.footer')
        </div>
    </div>
@endsection
