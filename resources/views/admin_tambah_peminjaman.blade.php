@extends('template.layout')

@if($level == 'admin')
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
                    <h1 class="mt-4">Denda Peminjaman</h1>

                    <form id="updatePeminjamanForm" method="POST" action="process_update_peminjaman.php">
                        <!-- Hidden input to pass the peminjaman ID -->
                        <input type="hidden" id="peminjamanId" name="peminjaman_id" value="">

                        <div class="form-group">
                            <label for="catatan">Catatan:</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="denda">Denda (Rp):</label>
                            <input type="number" class="form-control" id="denda" name="denda" min="0" step="1000" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-danger">Denda Peminjaman</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    @endsection