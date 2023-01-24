@extends('layouts.category')
@section('content')


@foreach ($categoryNews as $categoryNew)
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{$categoryNew['category']}}</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        </div>


   @foreach ($categoryNew['news'] as $newsFromCategory)
            <div class="row">
            <h2> {{$newsFromCategory['title']}}</h2>
            </div>
   @endforeach

    <a href="{{route('news.categoryNews', $categoryNew['id'])}}" class="btn btn-secondary">Далее</a>
    </div>


@endforeach
@endsection



