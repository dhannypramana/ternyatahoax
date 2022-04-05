<div class="container">
  <div class="row mt-5 justify-content-center">
    @if (session()->has('successAdd'))
      <div class="alert alert-success alert-dismissible fade show col-lg-6 mt-5" role="alert">
          {{ session('successAdd') }}
          <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
    <div class="col-md-7 mt-5">
        <div class="card mb-3">
            <div class="card-header p-3 mb-4 text-center h3">
                Lapor Berita!
            </div>
            <div class="card-body">
                <form action="/lapor" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="mb-0">Judul Berita <sup class="text-danger"><sup>*</sup>Required</sup></h5>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="text" name="title" class="form-control p-3 @error('title') is-invalid @enderror" placeholder="Masukkan judul berita yang kamu temukan">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="mb-0">Isi Berita <sup class="text-danger"><sup>*</sup>Required</sup></h5>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="hidden" name="body" id="body" class="@error('body') is-invalid @enderror">
                            <trix-editor input="body" placeholder="Masukkan isi berita tersebut"></trix-editor>
                            @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="mb-0">Gambar Berita <sup class="text-info"><sup>*</sup>Optional</sup></h5>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="file" name="image" class="p-3 form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="mb-0">Sumber Postingan <sup class="text-danger"><sup>*</sup>Required</sup></h5>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="text" name="link" class="p-3 form-control @error('link') is-invalid @enderror" placeholder="Masukkan sumber berita tersebut">
                            @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-user btn-block">
                        Lapor!
                    </button>
            </div>
        </div>
    </div>
  </div>
</div>

{{-- <div class="form-container" style="margin-top: 100px">
    <div class="container row justify-content-center mx-auto text-center">
      @if (session()->has('successAdd'))
          <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
              {{ session('successAdd') }}
              <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
    </div>
    <div class="title">Lapor Berita!</div>
    <div class="card-body">
      <form action="/lapor" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row col-lg-6">
          <div class="col-md-5">
              <h6 class="mb-0">Judul Berita</h6>
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Masukkan judul berita yang kamu baca" name="title">
                @error('title')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
          </div>
      </div>
            <div class="row justify-content-center">
              <div class="form-group col-lg-6">
                <label for="exampleFormControlTextarea1">Isi Postingan</label>
                <input type="hidden" name="body" id="body" class="@error('body') is-invalid @enderror">
                <trix-editor input="body"></trix-editor>
                @error('body')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="form-group col-lg-6">
                <label for="exampleFormControlFile1">Gambar Postingan</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="exampleFormControlFile1" name="image">
                @error('image')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="form-group col-lg-6">
                  <label for="exampleFormControlInput1">Sumber Postingan</label>
                  <input type="text" class="form-control @error('link') is-invalid @enderror" id="exampleFormControlInput1" placeholder="ini link" name="link">
                  @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
              </div>
            </div>
            <div class="row col text-center">
              <div class="button">
                  <button type="submit" class="btn btn-primary">Lapor</button>
              </div>
            </div>
          </div>
      </form>
    </div>
</div> --}}