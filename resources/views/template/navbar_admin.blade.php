<nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #876d8d; border-bottom: 1px solid #dee2e6;">
    @if ($level == 'admin')
        <a class="navbar-brand ps-3" href="/admin" style="color: #1d2125; font-weight: bold;">
            Admin Dashboard
        </a>
    @elseif($level == 'siswa')
        <a class="navbar-brand ps-3" href="/dashboard" style="color: #1d2125; font-weight: bold;">
            Siswa Dashboard
        </a>
    @endif
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"
        style="color: #6c757d;">
        <i class="fas fa-bars"></i>
    </button>
    <div class="ms-auto">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #343a40;">
                    <i class="fas fa-user-circle"></i> Akun
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="/pengaturan" style="color: #343a40;">Pengaturan</a></li>
                    <li><a class="dropdown-item" href="/logout" style="color: #343a40;">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
