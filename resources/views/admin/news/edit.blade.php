
@extends('layouts.admin')
@section('content')

    <form method="post" action="{{route('news.store')}}">
        <div class="form-group">
            <label for="header">Header</label>
            <input type="text" class="form-control" id="header" placeholder="Type header">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" placeholder="Type author">
        </div>
        <div class="form-group">
            <label for="description">Text of news</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Send</button>
    </form>

@endsection
