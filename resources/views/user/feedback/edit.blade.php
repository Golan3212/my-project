@extends('layouts.userActions')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

        <h1>Edit comment</h1>
    <form method="post" action="{{route('user.feedback.update', ['feedback'=>$feedbackItem])}}">
        @csrf
        @method('put')
        <div>
            <label for="username">Username</label>
            <input type="text" class="form-control" value="{{$feedbackItem->username}}" name="username" id="username" placeholder="Type name">
        </div>
        <div class="form-group">
            <label for="comment">Text of comment</label>
            <textarea class="form-control" name="comment"  id="comment" rows="3">{!! $feedbackItem->comment !!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>

@endsection
