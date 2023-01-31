<header class="p-3 bg-dark text-white">
    <div class="container">
        @auth
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                Hello {{auth()->user()->name}}!
            </a>
            <ul class="pl-5 nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('admin.managers') }}" class="nav-link px-2 text-white">Managers</a></li>
                <li><a href="{{ route('admin.employees') }}" class="nav-link px-2 text-white">Employees</a></li>
            </ul>
            <div class="text-end">
                <a href="{{ route('admin.logout') }}" class="btn btn-outline-light me-2">Logout</a>
            </div>
        </div>
        @endauth
    </div>
</header>
