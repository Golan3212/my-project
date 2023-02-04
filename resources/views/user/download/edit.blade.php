@extends('layouts.userActions')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

        <h1>Edit request</h1>
    <div class="album py-5 bg-light">
        <div class="container">
            <form method="post" action="{{route('user.download.update', ['download'=>$downloadItem])}}">
                @csrf
                @method('put')
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" value="{{$downloadItem->username}}" name="username" id="username" placeholder="Type name">
                </div> <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" value="{{$downloadItem->phone}}" name="phone" id="phone" placeholder="Type phone number">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{$downloadItem->email}}" name="email" id="email" placeholder="Type email">
                </div>
                <div class="form-group">
                    <label for="comment_to_get">Type what you want to get</label>
                    <textarea class="form-control" name="comment_to_get"  id="comment_to_get" rows="3">{{$downloadItem->comment_to_get}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
            </form>
        </div>
    </div>

@endsection
