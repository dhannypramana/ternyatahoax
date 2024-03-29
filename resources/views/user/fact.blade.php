@extends('user.layouts.main')

@section('container')
<div class="container p-5 mt-5">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8 rounded">
            <!-- Featured blog post-->
            @foreach ($reports as $report)
                <div class="card-header p-4 bg-success text-white">
                    Fakta
                </div>
                <div class="card mb-4">
                    @if ($report->image != null)
                        <img style="object-fit: cover;" height="300" class="card-img-top" src="{{ asset('/storage/images/' . $report->image) }}"/>
                    @else
                        <img class="card-img-top" src="https://dummyimage.com/850x350/fafafa/050726.jpg&text=+No+Image+Found"/>                        
                    @endif
                    <div class="card-body">
                        <div class="small text-muted">{{ $report->created_at->format('j F Y, H:i a') }} {{ $report->created_at->diffForHumans() }}</div>
                        <h2 class="card-title">{{ $report->title }}</h2>
                        <p class="card-text">
                            {!! $report->excerpt !!}
                        </p>
                        <a class="btn btn-primary" href="/blog/{{ $report->slug }}">Read more →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection