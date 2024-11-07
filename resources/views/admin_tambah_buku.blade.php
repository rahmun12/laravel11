@extends('template.layout')

@section('title', 'Halaman Create Penerbit')

@section('header')
    @include('template.navbar_admin')
@endsection

@section('main')
    <div id="layoutSidenav">
        @include('template.sidebar_admin')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Buku</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Halaman Create Data Buku</li>
                    </ol>
                    <form action="{{ route('action.createbuku') }}" class="row my-4 gap-3" method="post">
                        @csrf

                        {{-- <div class="form-group col-12 col-md-6 col-lg-4">
                        <label for="id" class="form-label">ID Buku</label>
                        <input type="text" name="id" id="id" class="form-control" placeholder="Masukkan id Buku">
                            </div> --}}
                            <div class="form-group col-12 col-md-6 col-lg-4">
                                <label for="penulis" class="form-label">Penulis Buku</label>
                                <select name="buku_penulis_id" id="penulis" class="form-control">
                                    <option value="">Pilih Penulis</option>
                                    <?php foreach ($penulis as $p) { ?>
                                    <option value="<?= $p->penulis_id ?>"><?= $p->penulis_nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="buku_kategori_id" id="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $p) { ?>
                                <option value="<?= $p->kategori_id ?>"><?= $p->kategori_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <select name="buku_penerbit_id" id="penerbit" class="form-control">
                                <option value="">Pilih Penerbit</option>
                                <?php foreach ($penerbit as $p) { ?>
                                <option value="<?= $p->penerbit_id ?>"><?= $p->penerbit_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="rak" class="form-label">rak</label>
                            <select name="buku_rak_id" id="rak" class="form-control">
                                <option value="">Pilih Rak</option>
                                <?php foreach ($rak as $p) { ?>
                                <option value="<?= $p->rak_id ?>"><?= $p->rak_nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" name="buku_judul" id="judul" class="form-control"
                                placeholder="Masukkan  judul buku">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="isbn" class="form-label">ISBN Buku</label>
                            <input type="text" name="buku_isbn" id="isbn" class="form-control"
                                placeholder="Masukkan  isbn buku">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <label for="thnpenerbit" class="form-label">Tahun Terbit Buku</label>
                            <input type="text" name="buku_thnpenerbit" id="thnpenerbit" class="form-control"
                                placeholder="Masukkan  tahun terbit">
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-4">
                            <button class="btn btn-success" type="submit">Tambahkan</button>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </form>
                </div>
            </main>
            @include('template.footer')
        </div>
    </div>
@endsection
