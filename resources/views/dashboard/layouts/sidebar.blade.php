<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        @if (auth()->user()->role == 'umkm')
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                        href="/dashboard">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                        <span data-feather="file-text"></span>
                        Produk Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/email') ? 'active' : '' }}" href="/dashboard/email">
                        <span data-feather="mail"></span>
                        Email Masuk
                    </a>
                </li>
            </ul>
        @else
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('manajemen/categories') ? 'active' : '' }}" aria-current="page"
                        href="/manajemen/categories">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('manajemen/users') ? 'active' : '' }}" href="/manajemen/users">
                        <span data-feather="file-text"></span>
                        Daftar User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('manajemen/history') ? 'active' : '' }}"
                        href="/manajemen/history">
                        <span data-feather="list"></span>
                        History
                    </a>
                </li>
            </ul>
        @endif

    </div>
</nav>
