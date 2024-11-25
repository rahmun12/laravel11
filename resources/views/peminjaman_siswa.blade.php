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
<style>
    body {
        background-color: #f3e5f5;
        color: #4a148c;
    }

    .btn-warning {
        background-color: #ffcc80;
        border: none;
    }

    .btn-warning:hover {
        background-color: #ffb74d;
    }

    .btn-danger {
        background-color: #f48fb1;
        border: none;
    }

    .btn-danger:hover {
        background-color: #f06292;
    }

    .table {
        background-color: #f8f3fa;
        color: #4a148c;
        border-color: #ce93d8;
    }

    .table th {
        background-color: #ba68c8;
        color: white;
        border-color: #ce93d8;
    }

    .table-hover tbody tr:hover {
        background-color: #e1bee7;
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
                <div id="layoutSidenav_content">
                    <main>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="row">No</th>
                                        <th scope="row">Buku</th>
                                        <th scope="row">Tanggal Pinjam</th>
                                        <th scope="row">Tanggal Kembali</th>
                                        <th scope="row">Note</th>
                                        <th scope="row">Denda</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($peminjaman as $peminjaman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $penerbit->penerbit_id }}</td> --}}
                                            <td>{{ $peminjaman->buku_content->buku_judul }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_tglpinjam }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_tglkembali }}</td>
                                            {{-- <td>{{ $peminjaman->peminjaman_content->peminjaman_statuskembalian }}</td> --}}
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_note }}</td>
                                            <td>{{ $peminjaman->peminjaman_content->peminjaman_denda }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
