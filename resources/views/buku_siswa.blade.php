@extends('template.layout')

@if ($level == 'admin')
    @section('title', 'Daftar Buku - Admin Perpustakaan')
@elseif($level == 'siswa')
    @section('title', 'Daftar Buku - Perpustakaan')
@endif

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

        .card {
            background-color: #fff;
            border: 1px solid #d1c4e9;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 16px;
            text-align: center;
        }

        .book-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        h1 {
            color: #6a1b9a;
        }

        .breadcrumb {
            background-color: transparent;
        }

        .btn-primary {
            background-color: #7e57c2;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #5e35b1;
        }

        footer {
            background-color: #f8f3fa;
            color: #6a1b9a;
        }
    </style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Daftar Buku</li>
                    </ol>

                    <div class="row g-4">
                        @foreach ($buku as $buku)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        @if ($buku['buku_urlgambar'] == '')
                                            <img src="./img/bulan.jpg" alt="Bulan" class="book-img" />
                                        @else
                                            <img src="{{ asset('storage/buku_pictures/' . basename($buku['buku_urlgambar'])) }}" alt="{{ $buku->buku_judul }}" class="book-img" />
                                        @endif
                                        <hr>
                                        <p class="text-center fw-bolder fs-5 my-0">{{ $buku->buku_judul }}</p>
                                        <p class="text-center mb-3 text-muted">Ditulis oleh {{ $buku->penulis->penulis_nama }}</p>
                                        <a href="{{ route('action.pinjam', ['id' => $buku->buku_id]) }}" class="btn btn-primary w-100">
                                            Pinjam Buku
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>

            <footer class="py-4 mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div>Copyright &copy; Web Perpustakaan 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
