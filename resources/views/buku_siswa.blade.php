@extends('template.layout')


@if ($level == 'siswa')
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
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Buku</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Halaman Daftar Buku</li>
                            </ol>
                            <div class="row gap-4">
                                @foreach ($buku as $buku)
                                    <div class="card col-12 col-md-4 col-lg-3">
                                        <div class="card-body">
                                            <img src="./img/bulan.jpg" alt="Bulan" class="book-img">
                                            <hr>
                                            <p class="text-center fw-bolder fs-4 my-0">{{ $buku->buku_judul }}</p>
                                            <p class="text-center mb-3">Ditulis oleh {{ $buku->penulis->penulis_nama }}</p>
                                            <a href="{{ route('action.pinjam', ['id' => $buku->buku_id]) }}"
                                                class="btn btn-primary d-block mx-auto">Pinjam</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
        </main>
    </div>
    </div>
@endsection
