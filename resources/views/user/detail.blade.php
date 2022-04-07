@extends('user.layouts.main')

@section('container')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1 mt-5">{{ $report->title }}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{ $report->created_at->format('j F Y, H:i a') }} {{ $report->created_at->diffForHumans() }}</div>
                    @if ($report->status_report == 1)
                        <div class="text-success fst-italic mb-2">Fakta</div>
                    @else
                        <div class="fst-italic text-danger mb-2">{{ $report->categoryhoax->category }}</div>
                    @endif
                </header>
                <!-- Preview image figure-->
                @if ($report->image != null)
                        <img class="card-img-top" src="{{ asset('/storage/images/' . $report->image) }}"/>
                @else
                    <img class="card-img-top" src="https://dummyimage.com/850x350/fafafa/050726.jpg&text=+No+Image+Found"/>                        
                @endif
                <!-- Post content-->
                <section class="mt-3 mb-5">
                    {!! $report->body !!}
                </section>
            </article>
        </div>
@endsection

