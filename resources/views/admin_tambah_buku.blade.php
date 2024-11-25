@extends('template.layout')

@section('title', 'Halaman Create Buku')

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
                    <h1 class="mt-4">Create Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Create Data Buku</li>
                    </ol>

                    <form enctype="multipart/form-data" action="{{ route('action.createbuku') }}" class="row my-4 gap-3" method="post">
                        @csrf

                        {{-- Form Input --}}
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="penulis" class="form-label">Penulis Buku</label>
                            <select name="buku_penulis_id" id="penulis" class="form-control">
                                <option value="">Pilih Penulis</option>
                                @foreach ($penulis as $p)
                                    <option value="{{ $p->penulis_id }}">{{ $p->penulis_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="buku_kategori_id" id="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->kategori_id }}">{{ $k->kategori_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <select name="buku_penerbit_id" id="penerbit" class="form-control">
                                <option value="">Pilih Penerbit</option>
                                @foreach ($penerbit as $p)
                                    <option value="{{ $p->penerbit_id }}">{{ $p->penerbit_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="rak" class="form-label">Rak</label>
                            <select name="buku_rak_id" id="rak" class="form-control">
                                <option value="">Pilih Rak</option>
                                @foreach ($rak as $r)
                                    <option value="{{ $r->rak_id }}">{{ $r->rak_nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" name="buku_judul" id="judul" class="form-control"
                                placeholder="Masukkan judul buku">
                        </div>

                        <div class="row mb-3">
                            <label for="buku_gambar" class="col-sm-2 col-form-label">Gambar Cover (opsional)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="buku_gambar" name="buku_gambar">
                            </div>
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="isbn" class="form-label">ISBN Buku</label>
                            <input type="text" name="buku_isbn" id="isbn" class="form-control"
                                placeholder="Masukkan ISBN buku">
                        </div>

                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="thnpenerbit" class="form-label">Tahun Terbit Buku</label>
                            <input type="text" name="buku_thnpenerbit" id="thnpenerbit" class="form-control"
                                placeholder="Masukkan tahun terbit">
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
