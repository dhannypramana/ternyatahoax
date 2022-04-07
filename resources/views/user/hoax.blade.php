@extends('user.layouts.main')

@section('container')
<div class="container p-5 mt-5">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8 rounded">
            <!-- Featured blog post-->
            @foreach ($reports as $report)
                <div class="card-header p-4 bg-danger text-white">
                    Hoax | 
                    {{ $report->categoryhoax->category }}
                </div>
                <div class="card mb-4">
                    @if ($report->image != null)
                        <img class="card-img-top" src="{{ asset('/storage/images/' . $report->image) }}"/>
                    @else
                        <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"/>                        
                    @endif
                    <div class="card-body">
                        <div class="small text-muted">{{ $report->created_at->format('F j, Y, H:i a') }}</div>
                        <h2 class="card-title">{{ $report->title }}</h2>
                        <p class="card-text text-center">{!! $report->excerpt !!}</p>
                        <a class="btn btn-primary" href="/blog/{{ $report->slug }}">Read more →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection