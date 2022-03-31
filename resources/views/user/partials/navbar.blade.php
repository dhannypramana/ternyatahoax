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
          <a class="nav-link " href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/fact">Fakta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/hoax">Hoax</a>
        </li>
      </ul>
        <a href="/login" class="btn btn-warning">Login as User</a>
        <div class="separator"></div>
        <a href="/admin/login" class="btn btn-warning">Login as Admin</a>
    </div>
  </div>
</nav>