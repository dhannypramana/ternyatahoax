@extends('admin.layouts.index')

@section('container')
    <form action="/admin/dashboard/unreviewed/{{ $report->slug }}/set-hoax" method="post" class="d-inline">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Category Hoax</label>
            <select class="form-control col-lg-6" id="exampleFormControlSelect1" name="category">
                <option value="1">1. Satire atau Parody</option>
                <option value="2">2. False Connection</option>
                <option value="3">3. Misleading Content</option>
                <option value="4">4. False Context</option>
                <option value="5">5. Imposter Content</option>
                <option value="6">6. Manipulated Content</option>
                <option value="7">7. Fabricated Content</option>
            </select>
        </div>
        <button type="submit" class="btn btn-danger" name="hoax">Hoax</button><br><br>
        <a href="/admin/dashboard/category" class="small">*Baca panduan untuk menentukan category hoax</a>
    </form>
@endsection