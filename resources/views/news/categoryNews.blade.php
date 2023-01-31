@extends('layouts.categoryNews')
@section('content')

@php $n = $category @endphp
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">{{$n->title}}</h1>
        <p class="display-4 font-italic>{{$n->description}}"></p>
    </div>
</div>
<div class="row mb-2">
@foreach ($newsList as $news)

        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">{{$news->author}}</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="#">{{$news->title}}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{$news->created_at}}</div>
                    <p class="card-text mb-auto">{{$news->description}}</p>
                    <a href="{{route('news.show', $news->id)}}">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
            </div>
        </div>
@endforeach
</div>
@endsection
