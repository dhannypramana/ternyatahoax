{{-- <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/">TerHoaxKan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
        <ul class="navbar-nav ms-4 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Fakta') ? 'active' : '' }}" href="/fact">Fakta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Hoax') ? 'active' : '' }}" href="/hoax">Hoax</a>
          </li>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </ul>
      </div>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Ternyata Hoaks</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link @if ($active == 'home') active @endif" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if ($active == 'fact') active @endif" href="/fact">Fakta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if ($active == 'hoax') active @endif" href="/hoax">Hoax</a>
        </li>
    </ul>

      <div class="topbar-divider d-none d-sm-block"></div>

      @auth
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-person-circle"></i>
                <span class="px-2 mr-2 d-none d-lg-inline text-gray-600 small">
                    @if (auth()->user() !== null)
                        {{ auth()->user()->username }}
                    @else
                        Not Authorized
                    @endif
                </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                  </button>
              </form>
                <div class="dropdown-divider"></div>
            </div>
          </li>
        </ul>
      @else
        <a href="/login" class="btn btn-warning">Login as User</a>
        <a href="/admin/login" class="btn btn-warning">Login as Admin</a>
      @endauth
    </div>
  </div>
</nav>