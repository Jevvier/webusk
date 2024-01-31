<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container-fluid">
        <img src="/assets/img/coffe.png" alt="Logo" width="100" height="95">
        <a class="navbar-brand text-uppercase fw-bold" href="/">Coffe Best</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/">Home</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/produk">Produk</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href=" store">Store</a></li>
            </ul>
            @if(!Auth::check())
                <a class="nav-item px-lg-4"><a class="nav-link text-uppercase btn px-3 py-2 fw-semibold" style="background: rgba(102, 51, 42, 0); color: rgba(204, 255, 255)" href="/dashboard">LOGIN</a>
            @else
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b class="text-primary">{{ Auth::user()->email}}</b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="p-2 bg-info text-bold">Level: {{ Auth::user()->role}}</li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (!request()->routeIs('dashboard'))
                            <li>
                                <a href="/dashboard" class="ms-2">Dashboard</a>
                            </li>
                        @endif
                        <li class="p-2">
                            <a href="{{route('actionlogout')}}">
                                <button class="btn btn-outline-warning" type="submit">Log Out</button>
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
            <i class="bi bi-list mobile-nav-toggle"></i>
        </div>
    </div>
</nav>