
<div class="form-container" style="margin-top: 100px">
    <div class="container row justify-content-center">
      @if (session()->has('successAdd'))
          <div class="alert alert-success alert-dismissible fade show col-lg-6 justify-content-center" role="alert">
              {{ session('successAdd') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
    </div>
    <div class="title">Ini Judul</div>
    <form action="/lapor" method="POST">
      @csrf
        <div class="container">
          <div class="row justify-content-center">
            <div class="form-group col-lg-6">
              <label for="exampleFormControlInput1">Judul Postingan</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ini Judul" name="title">
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="form-group col-lg-6">
              <label for="exampleFormControlTextarea1">Isi Postingan</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="form-group col-lg-6">
              <label for="exampleFormControlFile1">Gambar Postingan</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
            </div>  
          </div>
          <div class="row justify-content-center">
            <div class="form-group col-lg-6">
                <label for="exampleFormControlInput1">Sumber Postingan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ini link" name="link">
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