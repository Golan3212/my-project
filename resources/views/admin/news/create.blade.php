@extends('layouts.admin')
@section('content')

    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        <div class="form-group">
            <label for="title">Header</label>
            <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title" placeholder="Type title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" value="{{old('author')}}" name="author" id="author" placeholder="Type author">
        </div>
        <div class="form-group">
            <label for="description">Text of news</label>
            <textarea class="form-control" name="description"  id="description" rows="3">{{old('description')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>

@endsection
