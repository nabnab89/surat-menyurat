<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style">
                    <i class="ficon" data-feather="moon"></i>
                </a>
            </li>
            <li class="nav-item dropdown dropdown-notification me-25">
                <a class="nav-link" href="#" data-bs-toggle="dropdown">
                    <i class="ficon" data-feather="bell"></i>
                    @if ($incoming->count != 0)
                        <span class="badge rounded-pill bg-danger badge-up">{{ $incoming->count }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 me-auto">Notifikasi</h4>
                            @if ($incoming->count != 0)
                                <div class="badge rounded-pill badge-light-primary">{{ $incoming->count }} New</div>
                            @endif
                        </div>
                    </li>
                    <li class="scrollable-container media-list">
                        @if ($incoming->count != 0)
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content">
                                                <i class="avatar-icon" data-feather="file-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Terdapat
                                                {{ $incoming->count }} surat baru</p>
                                        <small class="notification-text"> Silahkan dibuka pada menu surat baru</small>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content">
                                                <i class="avatar-icon" data-feather="check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading">
                                            <span class="fw-bolder">Tidak ada surat baru
                                        </p>
                                        <small class="notification-text">Saat ini belum ada surat baru untuk
                                            anda</small>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </li>
                    @if ($incoming->count != 0)
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-primary w-100" href="{{ route('suratmasuk.index') }}">Buka Surat</a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($user->id_role == 1)
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ $user->teacher->name }}</span>
                            <span class="user-status">Guru</span>
                        </div>
                        <span class="avatar bg-light-primary">
                            <span class="avatar-content">{{ substr($user->teacher->name, 0, 1) }}</span>
                            <span class="avatar-status-online">
                            </span>
                        </span>
                    @else
                        <span class="user-name fw-bolder">Penyusup</span>
                        <span class="avatar bg-light-danger">
                            <span class="avatar-content">P</span>
                            <span class="avatar-status-online">
                            </span>
                        </span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="#">
                        <i class="me-50" data-feather="user"> </i>
                        Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="me-50" data-feather="settings"></i>
                        Settings</a>
                    <a class="dropdown-item" href="{{ route('end') }}">
                        <i class="me-50" data-feather="power"></i>
                        Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
