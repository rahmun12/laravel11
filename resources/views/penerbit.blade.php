@extends('template.layout')

@if ($level == 'admin')
    @section('title', 'Daftar Penerbit - Admin Perpustakaan')
@elseif($level == 'siswa')
    @section('title', 'Daftar Penerbit - Perpustakaan')
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
    </style>

    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Penerbit</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Data Penerbit</li>
                    </ol>
                    <a href="{{ route('create_penerbit') }}">
                        <button class="btn btn-primary my-3">
                            <i class="fas fa-plus me-2"></i>Tambah Penerbit
                        </button>
                    </a>

                    {{-- Alert Notifications --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('updated'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('updated') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif (session('deleted'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('deleted') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Penerbit
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penerbit</th>
                                            <th>Alamat Penerbit</th>
                                            <th>No Telp Penerbit</th>
                                            <th>Email Penerbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penerbits as $penerbit)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penerbit->penerbit_nama }}</td>
                                                <td>{{ $penerbit->penerbit_alamat }}</td>
                                                <td>{{ $penerbit->penerbit_notelp }}</td>
                                                <td>{{ $penerbit->penerbit_email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('update_penerbit', ['id' => $penerbit->penerbit_id]) }}"
                                                        class="btn btn-warning btn-sm mx-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('penerbit.delete', ['penerbit_id' => $penerbit->penerbit_id]) }}"
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
                                <div class="d-flex justify-content-end">
                                    {{ $penerbits->links() }}
                                </div>
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
