@extends('layouts.category')
@section('content')


@foreach ($categoryList as $category)
    <div class="jumbotron">
        <div class="container" style="width: 90%">
            <h1 class="display-3">{{$category->title}}</h1>
            <p>{{$category->description}}</p>


   @foreach ($newsList as $news)
            <div class="row">
            <h2> {{$news->title}}</h2>
            </div>
   @endforeach

    <a href="{{route('news.categoryNews', $category->id)}}" class="btn btn-secondary">Далее</a>
        </div>
    </div>


@endforeach
@endsection



