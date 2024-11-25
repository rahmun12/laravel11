@extends('template.layout')

@if ($level == 'admin')
    @section('title', 'Update Peminjaman - Admin Perpustakaan')
@elseif($level == 'siswa')
    @section('title', 'Update Peminjaman - Perpustakaan')
@endif

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <style>
        body {
            background-color: #f3e5f5; /* Latar belakang ungu muda */
            color: #4a148c; /* Warna teks ungu tua */
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

        .form-control {
            background-color: #f8f3fa; /* Warna latar belakang input */
            color: #4a148c; /* Warna teks input */
            border: 1px solid #ce93d8; /* Border ungu pastel */
        }

        .form-control:focus {
            border-color: #ba68c8;
            box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, 0.25);
        }

        .btn-primary {
            background-color: #ce93d8; /* Tombol ungu pastel */
            border: none;
        }

        .btn-primary:hover {
            background-color: #ba68c8;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Update Peminjaman</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Update Data Peminjaman</li>
                    </ol>
                    <div class="card">
                        <form action="{{ route('action.peminjaman.update', ['id' => $peminjaman->peminjaman_id]) }}" method="POST" class="row gap-3">
                            @csrf
                            @method('PUT')
                            <div class="col-12 col-md-6 form-group">
                                <label class="form-label">Buku</label>
                                <input type="text" class="form-control" value="{{ $peminjaman->buku[0]['buku_judul'] }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="denda" class="form-label">Denda</label>
                                <input type="number" name="denda" id="denda" class="form-control" placeholder="Masukkan denda" value="{{ old('denda') }}">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Kembali" {{ $peminjaman->status == 'Kembali' ? 'selected' : '' }}>Kembali</option>
                                    <option value="Belum Kembali" {{ $peminjaman->status == 'Belum Kembali' ? 'selected' : '' }}>Belum Kembali</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="catatan" class="form-label">Catatan</label>
                                <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Masukkan catatan" value="{{ $peminjaman->catatan }}">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
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
