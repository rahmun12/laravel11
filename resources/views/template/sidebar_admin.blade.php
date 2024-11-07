<!--
    Dashboard,
    Daftar Buku,
    Peminjaman,
    Pengaturan,
    Logout
    untuk Siswa


    Dashboard,
    Buku,
    Kategori Buku,
    Penulis,
    Penerbit,
    Peminjaman,
    Pengaturan,
    Logout
    untuk Admin

    // siswa
    Route::get('/daftar-buku', [PageController::class, 'buku'])->name('buku.index');
    Route::get('/peminjaman', [PageController::class, 'peminjaman'])->name('peminjaman.index');
    Route::get('/pengaturan', [PageController::class, 'pengaturan'])->name('pengaturan');

    // admin
    Route::get('/daftar-buku-admin', [PageController::class, 'bukuAdmin'])->name('buku.index');

    Route::get('/kategori', [PageController::class, 'kategori'])->name('kategori.index');
    Route::get('/penulis', [PageController::class, 'penulis'])->name('penulis.index');
    Route::get('/penerbit', [PageController::class, 'penerbit'])->name('penerbit.index');

    Route::get('/peminjaman-admin', [PageController::class, 'peminjamanAdmin'])->name('peminjaman.index');
    Route::get('/pengaturan-admin', [PageController::class, 'pengaturanAdmin'])->name('pengaturan');

--->

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            @if ($level == 'admin')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="/daftar-buku-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Buku
                    </a>
                    <a class="nav-link" href="/daftar-kategori-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Kategori Buku
                    </a>
                    <a class="nav-link" href="/daftar-penulis-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                        Penulis
                    </a>
                    <a class="nav-link" href="/daftar-penerbit-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                        Penerbit
                    </a>
                    <a class="nav-link" href="/daftar-rak-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Rak
                    </a>
                    <a class="nav-link" href="/daftar-peminjaman-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="/daftar-pengaturan-admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href="/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                        Logout
                    </a>
                </div>
            @elseif($level == 'siswa')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="/daftar-buku-siswa">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Buku
                    </a>
                    <a class="nav-link" href="/peminjaman-siswa">
                        <div class="sb-nav-link-icon"><i class="fas fa-hand"></i></div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="/daftar-pengaturan-siswa">
                        <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href="/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                        Logout
                    </a>
                </div>
            @endif

        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @if ($level == 'admin')
                <span>Admin Perpustakaan</span>
            @elseif($level == 'siswa')
                <span>Siswa Perpustakaan</span>
            @endif

        </div>
    </nav>
</div>
