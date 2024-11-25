@extends('template.layout')

@if($level == 'admin')
    @section('title', 'Pengaturan Siswa - Admin Perpustakaan')
@elseif($level == 'siswa')
    @section('title', 'Pengaturan Siswa - Perpustakaan')
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

        h1 {
            color: #6a1b9a;
        }

        .breadcrumb {
            background-color: transparent;
        }

        .form-label {
            font-weight: bold;
            color: #6a1b9a;
        }

        .form-control {
            border: 1px solid #d1c4e9;
            border-radius: 8px;
            transition: border-color 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #7e57c2;
            box-shadow: 0 0 5px rgba(126, 87, 194, 0.5);
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
                    <h1 class="mt-4">Pengaturan Siswa</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Pengaturan</li>
                    </ol>
                    <form action="" method="POST">
                        <div class="row gap-3">
                            <div class="col-12 col-md-4 form-group">
                                <label for="nama" class="form-label">Nama *</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama anda">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="username" class="form-label">Username *</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username anda">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="alamat" class="form-label">Alamat *</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat anda">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email anda">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="no_hp" class="form-label">Nomor HP *</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan nomor HP anda">
                            </div>
                            <div class="col-12 col-md-4 form-group">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password anda">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12 col-md-4">
                                <button class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
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
