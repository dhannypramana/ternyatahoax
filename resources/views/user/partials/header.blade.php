<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Ternyata Hoaks</h1>
                <hr class="divider" />
            </div>
            @if(auth()->user() !== null)
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Lapor berita dan cek faktanya</p>
                    <a class="btn btn-primary btn-xl" href="/lapor">Lapor</a>
                </div>
            @else
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Lapor berita dan cek faktanya</p>
                    <a class="btn btn-primary btn-xl" href="/register">Daftar Sekarang</a>
                </div>
            @endif
        </div>
    </div>
</header>