@extends('template.layout')

@if ($level == 'admin')
    @section('title', 'Daftar Peminjaman - Admin Perpustakaan')
@elseif($level == 'siswa')
    @section('title', 'Daftar Peminjaman - Perpustakaan')
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
    
        .btn-primary {
            background-color: #ce93d8;
            border: none;
        }
    
        .btn-primary:hover {
            background-color: #ba68c8;
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
    
        .card-header {
            background-color: #ba68c8;
            color: white;
        }
    </style>
    

    <div id="layoutSidenav">
        @include('template.sidebar_admin')

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Peminjaman</h1>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card mb-4">
                        <div class="card-header" style="background-color: #6a1b9a; color: #fff;">
                            <i class="fas fa-table me-1"></i> Data Peminjaman
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Catatan</th>
                                            <th>Denda</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $row)
                                            <tr>
                                                <td class="text-center">{{ $row->peminjaman_id }}</td>
                                                <td>{{ $row->buku[0]->buku_judul }}</td>
                                                <td>{{ $row->peminjaman_tglpinjam }}</td>
                                                <td>
                                                    @if ($row->peminjaman_statuskembali == 1)
                                                        {{ $row['peminjaman_tglkembali'] }}
                                                    @else
                                                        (belum kembali)
                                                    @endif
                                                </td>
                                                <td>{{ $row->peminjaman_note }}</td>
                                                <td class="text-center">{{ $row->peminjaman_denda }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('update_peminjaman', ['id' => $row->peminjaman_id]) }}"
                                                        class="btn btn-warning btn-sm mx-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('peminjaman.delete', ['id' => $row->peminjaman_id]) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm mx-1" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
