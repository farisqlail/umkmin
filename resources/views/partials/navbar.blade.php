<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/assets/UMKM.png') }}" alt="">
            </a>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 h5">
                @auth
                    @if (auth()->user()->role == 'umkm')
                        @if (!empty(auth()->user()->email_verified_at))
                            <li class="nav-item border-end">
                                <a class="nav-link text-white" href="/dashboard">UMKM</a>
                            </li>
                        @else
                            <li class="nav-item border-end">
                                <a class="nav-link text-white" href="/">UMKM</a>
                            </li>
                            <script type='text/javascript'>
                                Swal.fire({
                                    text: 'Anda harus verified email terlebih dahulu!!!',
                                    icon: 'error',
                                })
                            </script>
                        @endif
                    @elseif (auth()->user()->role == 'admin')
                        <li class="nav-item border-end">
                            <a class="nav-link" href="/manajemen/categories">Admin</a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item border-end">
                    <a class="nav-link text-white"href="/">Beranda</a>
                </li>
                <li class="nav-item border-end">
                    <a class="nav-link text-white" href="/about">Tentang Kami</a>
                </li>
                @auth
                    <form action="/keluar" method="post">
                        @csrf
                        <li class="nav-item">
                            <a class="" style="text-decoration: none;"><button
                                    class="nav-link text-white btn btn-link mt-1 ms-2" type="submit"
                                    style="padding: 0;">Keluar</button></a>
                        </li>
                    </form>
                @else
                    <li class="nav-item border-end">
                        <a class="nav-link text-white" href="/login">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/register">Daftar</a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
