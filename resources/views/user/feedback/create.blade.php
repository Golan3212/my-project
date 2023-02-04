@extends('layouts.userActions')
@section('content')

    <form method="post" action="{{route('user.feedback.store')}}">
        @csrf
        <div class="form-group">
            <label for="username">Author</label>
            <input type="text" class="form-control" value="{{old('author')}}" name="username" id="username" placeholder="Type name">
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment"  id="comment" rows="3">{{old('comment')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>

@endsection

