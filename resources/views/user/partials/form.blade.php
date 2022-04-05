<div class="form-container" style="margin-top: 100px">
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
    <div class="title">Ini Judul</div>
    <form action="/lapor" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="container">
          <div class="row justify-content-center">
            <div class="form-group col-lg-6">
              <label for="exampleFormControlInput1">Judul Postingan</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Ini Judul" name="title">
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