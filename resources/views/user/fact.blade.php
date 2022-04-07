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
                        <a href="#!"><img class="card-img-top" src="{{ asset('/storage/images/' . $report->image) }}"/></a>
                    @else
                        <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"/></a>                        
                    @endif
                    <div class="card-body">
                        <div class="small text-muted">{{ $report->created_at->format('F j, Y, H:i a') }}</div>
                        <h2 class="card-title">{{ $report->title }}</h2>
                        <p class="card-text">
                            {!! $report->body !!}
                        </p>
                        <a class="btn btn-primary" href="fact/detail">Read more →</a>
                    </div>
                </div>
            @endforeach
        </div>
    
        <div class="col-lg-4">
        <!-- Search widget-->
        <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection