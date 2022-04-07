@extends('user.layouts.main')

@section('container')
<div class="container p-5 mt-5">
    <div class="row">
        <div class="col-lg-7 rounded">
            @foreach ($reports as $report)
                <div class="card mb-4">
                    <div class="card-header p-4 bg-danger text-white">Hoax | {{ $report->categoryhoax->category }}</div>
                    @if ($report->image != null) <img class="card-img-top" src="{{ asset('/storage/images/' . $report->image) }}"/>
                    @else <img class="card-img-top" src="https://dummyimage.com/850x350/fafafa/050726.jpg&text=+No+Image+Found"/>
                    @endif
                    <div class="card-body">
                        <div class="small text-muted">{{ $report->created_at->format('F j, Y, H:i a') }}</div>
                        <h2 class="card-title">{{ $report->title }}</h2>
                        <p class="card-text text-center">{!! $report->excerpt !!}</p>
                        <a class="btn btn-primary" href="/blog/{{ $report->slug }}">Read more →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection