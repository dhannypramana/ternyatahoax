@extends('user.layouts.main')

@section('container')
    {{-- Jumbotron --}}
    <section class="jumbotron text-center">
        <div class="row justify-content-center">
            <h1 class="display-4 text-primary fw-bold">TERNYATA HOAKS</h1>
            {{-- <p class="lead col-md-4">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
            <p class="lead col-md-4">Yuk Lapor dan Cek Kredibilitas Berita yang Kamu Temui di Ternyata Hoaks!!!</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                @if (auth()->user())
                    <a class="btn btn-primary btn-lg p-3" style="margin-bottom: 100px" href="/lapor" role="button">Ayo Lapor Sekarang! </a>
                @else
                    <a class="btn btn-primary btn-lg p-3" style="margin-bottom: 100px" href="/register" role="button">Daftar Sekarang </a>
                @endif
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#0d6efd"
              fill-opacity="1"
              d="M0,32L40,26.7C80,21,160,11,240,37.3C320,64,400,128,480,160C560,192,640,192,720,176C800,160,880,128,960,112C1040,96,1120,96,1200,106.7C1280,117,1360,139,1400,149.3L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
            ></path>
          </svg>
    </section>
    {{-- Jumbotron End --}}

    {{-- About --}}
    <section id="about">
        <div class="container">
            <div class="row text-center text-white mb-3">
                <div class="col">
                    <h2 class="fw-bold">About Ternyata Hoax</h2>
                </div>
            </div>
            <div class="row text-white justify-content-center">
                <div class="col-md-5 mb-3">
                    <div class="icon" style="text-align: center">
                        <i class="fa-solid fa-newspaper fa-6x"></i>
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi illum consequatur expedita error porro et dolorum nisi voluptate architecto autem! Dolore quae voluptatum odit eius incidunt, qui voluptate consequatur. Doloribus?</p>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <div class="icon" style="text-align: center">
                        <i class="fa-solid fa-circle-check fa-6x"></i>
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi illum consequatur expedita error porro et dolorum nisi voluptate architecto autem! Dolore quae voluptatum odit eius incidunt, qui voluptate consequatur. Doloribus?</p>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <div class="icon" style="text-align: center">
                        <i class="fa-solid fa-newspaper fa-6x"></i>
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi illum consequatur expedita error porro et dolorum nisi voluptate architecto autem! Dolore quae voluptatum odit eius incidunt, qui voluptate consequatur. Doloribus?</p>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <div class="icon" style="text-align: center">
                        <i class="fa-solid fa-newspaper fa-6x"></i>
                        <p style="text-align: justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi illum consequatur expedita error porro et dolorum nisi voluptate architecto autem! Dolore quae voluptatum odit eius incidunt, qui voluptate consequatur. Doloribus?</p>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#ffffff"
              fill-opacity="1"
              d="M0,64L48,64C96,64,192,64,288,101.3C384,139,480,213,576,245.3C672,277,768,267,864,218.7C960,171,1056,85,1152,74.7C1248,64,1344,128,1392,160L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
            ></path>
          </svg>
    </section>
    {{-- About End --}}

    {{-- Content --}}
    <section id="content">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2 class="fw-bold">Review Berita Terbaru</h2>
                </div>
            </div>
            <div class="row gx-lg-5 justify-content-center">
                @foreach ($reports as $report)
                    @if ($report->isReviewed == 1)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                @if ($report->image != null)<img src="{{ asset('storage/images/' . $report->image) }}" class="card-img-top" height="288" style="object-fit: cover">
                                @else<img src="https://dummyimage.com/600x400/ffffff/000000.png&text=this+report+has+no+image" class="card-img-top" height="288" style="object-fit: fill">@endif
                                <div class="card-body">
                                    @if ($report->status_report == 1)<h6 class="card-subtitle mb-2 fw-bold text-success">Fakta</h6>
                                    @else <h6 class="card-subtitle mb-2 fw-bold text-danger">{{ $report->categoryhoax->category }}</h6>@endif
                                    <h5 class="card-title text-center">{{ $report->title }}</h5>
                                    <p class="card-text">{{ $report->excerpt }}</p>
                                    <a href="/blog/{{ $report->slug }}" class="card-link text-decoration-none">Lihat Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0d6efd" fill-opacity="1" d="M0,32L48,58.7C96,85,192,139,288,154.7C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,218.7C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    {{-- Content End --}}

    {{-- Lapor --}}
    <section id="lapor">
        <div class="container">
            <div class="row text-center text-white mb-3">
                <div class="col">
                    <h2>Ingin Mengecek Fakta atau Tidaknya Berita?</h2>
                    <h2>Lapor Disini</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <a type="submit" class="btn btn-light fw-bold text-primary p-3 w-25" href="/lapor">Lapor</a>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,133.3C672,139,768,181,864,192C960,203,1056,181,1152,160C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    {{-- Lapor End --}}

    {{-- Footer --}}
    <footer class="pb-3">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-4">
                    <img src="https://diskominfotik.lampungprov.go.id/uploads/photos/1/logo.png" style="width: 200px" alt="">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Logo_ITERA.png/240px-Logo_ITERA.png" style="width: 75px" alt="">
                    <h5 style="text-align: left">Created By Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ullam possimus voluptates iure necessitatibus excepturi officia tenetur error, minima perferendis!</h5>
                </div>
                <div class="col-md-4">
                    <div class="contact-info">
                        <h2>Contacs</h2>
                        <div class="kominfo pb-3">
                            <h5 class="text-primary">Diskominfotik</h5>
                            <a href="https://www.instagram.com/diskominfotik.lampung" class="text-decoration-none" target="_blank">
                                <span class="fa-stack fa-1x" style="vertical-align: top">
                                  <i class="fa-regular fa-circle fa-stack-2x"></i>
                                  <i class="fa-brands fa-instagram fa-stack-1x"></i>
                                </span>
                            </a>
                            <a href="mailto:diskominfotik@lampungprov.go.id" class="text-decoration-none" target="_blank">
                                <span class="fa-stack fa-1x" style="vertical-align: top">
                                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-envelope fa-stack-1x"></i>
                                </span>
                            </a>
                            <a href="https://diskominfotik.lampungprov.go.id/" class="text-decoration-none" target="_blank">
                                <span class="fa-stack fa-1x" style="vertical-align: top">
                                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-globe fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                        <div class="itera">
                            <h5 class="text-primary">ITERA</h5>
                            <a href="https://www.instagram.com/iteraofficial" class="text-decoration-none" target="_blank">
                                <span class="fa-stack fa-1x" style="vertical-align: top">
                                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                                    <i class="fa-brands fa-instagram fa-stack-1x"></i>
                                </span>
                            </a>
                            <a href="mailto:pusat@itera.ac.id/" class="text-decoration-none" target="_blank">
                                <span class="fa-stack fa-1x" style="vertical-align: top">
                                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-envelope fa-stack-1x"></i>
                                </span>
                            </a>
                            <a href="https://itera.ac.id/" class="text-decoration-none" target="_blank">
                                <span class="fa-stack fa-1x" style="vertical-align: top">
                                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-globe fa-stack-1x"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-3 text-center fw-bold">
                <p>DISKOMINFOTIK PPID LAMPUNG 2022</p>
            </div>
        </div>
    </footer>
    {{-- Footer End --}}
    {{ $reports->links() }}
@endsection