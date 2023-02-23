@extends('layouts.main')
@section('content')
    <div class="row mb-2">

@forelse ($newsList as $news)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">{{$news->author}}</strong>
                        <h5 class="mb-0">
                            <a class="text-dark" href="#">{{$news->title}}</a>
                        </h5>
                        <div class="mb-1 text-muted">{{$news->pubDate}}</div>
                        <p class="card-text mb-auto">{!! $news->description !!}</p>
                        <a href="{{route('news.show', ['news' => $news])}}">Continue reading</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" src="{{Storage::disk('public')->url($news->image)}}"

                    style="width: 40%">
                </div>
            </div>
@empty
    <h2>No news there</h2>
@endforelse
    {{$newsList->Links()}}
    </div>
@endsection

