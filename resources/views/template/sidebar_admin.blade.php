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
    <nav class="sb-sidenav accordion" id="sidenavAccordion" style="background-color: #9b7a9c; color: #343a40;">
        <div class="sb-sidenav-menu">
            @if ($level == 'admin')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading" style="color: #6c757d;">Menu</div>
                    <a class="nav-link" href="/admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="/daftar-buku-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-book"></i></div>
                        Buku
                    </a>
                    <a class="nav-link" href="/daftar-kategori-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-list"></i></div>
                        Kategori Buku
                    </a>
                    <a class="nav-link" href="/daftar-penulis-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-pencil-alt"></i></div>
                        Penulis
                    </a>
                    <a class="nav-link" href="/daftar-penerbit-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-building"></i></div>
                        Penerbit
                    </a>
                    <a class="nav-link" href="/daftar-rak-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-box"></i></div>
                        Rak
                    </a>
                    <a class="nav-link" href="/daftar-peminjaman-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-hand-holding"></i></div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="/daftar-pengaturan-admin" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-cogs"></i></div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href="/logout" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a>
                </div>
            @elseif($level == 'siswa')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading" style="color: #6c757d;">Menu</div>
                    <a class="nav-link" href="/dashboard" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="/daftar-buku-siswa" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-book"></i></div>
                        Buku
                    </a>
                    <a class="nav-link" href="/peminjaman-siswa" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-hand-holding"></i></div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="/daftar-pengaturan-siswa" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-cogs"></i></div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href="/logout" style="color: #343a40;">
                        <div class="sb-nav-link-icon" style="color: #6c757d;"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a>
                </div>
            @endif
        </div>
        <div class="sb-sidenav-footer" style="background-color: #e9ecef; color: #343a40;">
            <div class="small">Logged in as:</div>
            @if ($level == 'admin')
                <span>Admin Perpustakaan</span>
            @elseif($level == 'siswa')
                <span>Siswa Perpustakaan</span>
            @endif
        </div>
    </nav>
</div>
