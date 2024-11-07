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
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Kategori</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Halaman Data Kategori</li>
                            </ol>
                            <a href="{{ route('create_kategori') }}">
                                <button class="btn btn-primary my-3">Tambah Kategori</button>
                            </a>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @elseif (session('updated'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> {{ session('deleted') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @elseif (session('deleted'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Berhasil!</strong> {{ session('updated') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="row">No</th>
                                            <th scope="row">Nama Kategori</th>
                                            <th scope="row">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoris as $kategori)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kategori->kategori_nama }}</td>
                                                <td>
                                                    <div>
                                                        <a
                                                            href="{{ route('update_kategori', ['id' => $kategori->kategori_id]) }}">
                                                            <button class="btn btn-warning"><i
                                                                    class="fas fa-pencil"></i></button>
                                                        </a>
                                                        {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
                                                        <form
                                                            action="{{ route('kategori.delete', ['kategori_id' => $kategori->kategori_id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $kategoris->links('vendor.pagination.bootstrap-5') }}

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
