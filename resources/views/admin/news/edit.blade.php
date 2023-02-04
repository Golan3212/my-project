@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

        <h1>Edit news</h1>
    <form method="post" action="{{route('admin.news.update', ['news'=>$news])}}">
        @csrf
        @method('put')
        <div>
            <label for="title">Header</label>
            <input type="text" class="form-control" value="{{$news->title}}" name="title" id="title" placeholder="Type title">
        </div>
        <div class="form-group">
            <label for="category_ids">Category</label>
            <select class="form-control"  name="category_ids[]" id="category_ids" multiple>
                <option value="0">--Select--</option>
                @foreach($categories as $category)
                    <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">{{$category->title}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" value="{{$news->author}}" name="author" id="author" placeholder="Type author">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control"  name="status" id="status">
                <option value="0">--Select--</option>
                @foreach($statusList as $status)
                    <option @if(old('$status') === $status) selected @endif>{{$status}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control"  name="image" id="image">
        </div>
        <div class="form-group">
            <label for="description">Text of news</label>
            <textarea class="form-control" name="description"  id="description" rows="3">{!! $news->description !!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>

@endsection
