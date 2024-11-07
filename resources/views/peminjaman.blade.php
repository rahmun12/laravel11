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
                <div class="container">
                    <h1 class="mt-4">Daftar Peminjaman</h1>
                    <!-- <a href="tambah-peminjaman" class="btn btn-primary mb-3">Tambah Peminjaman Baru</a> -->

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-bordered">
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
                        <tbody id="">
                            <!-- Data peminjaman akan dimasukkan di sini melalui JavaScript -->
                            @foreach ($peminjaman as $row)
                                <tr>
                                    <td>{{ $row->peminjaman_id }}</td>
                                    <td>{{ $row->buku[0]->buku_judul }}</td>
                                    <td>{{ $row->peminjaman_tglpinjam }}</td>
                                    @if ($row->peminjaman_statuskembali == 1)
                                        <td>{{ $row['peminjaman_tglkembali'] }}</td>
                                    @else
                                        <td>(belum kembali)</td>
                                    @endif
                                    <td>{{ $row->peminjaman_note }}</td>
                                    <td>{{ $row->peminjaman_denda }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('update_peminjaman', ['id' => $row->peminjaman_id]) }}">
                                                <button class="btn btn-warning"><i class="fas fa-pencil"></i></button>
                                            </a>
                                            {{-- <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
                                            <form action="{{ route('peminjaman.delete', ['id' => $row->peminjaman_id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
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
