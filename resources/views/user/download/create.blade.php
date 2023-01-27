@extends('layouts.userActions')
@section('content')

    <form method="post" action="{{route('user.download.store')}}">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" value="{{old('username')}}" name="username" id="username" placeholder="Type name">
        </div> <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" value="{{old('phone')}}" name="phone" id="phone" placeholder="Type phone number">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Type email">
        </div>
        <div class="form-group">
            <label for="wishInfo">Type what you want to get</label>
            <textarea class="form-control" name="wishInfo"  id="wishInfo" rows="3">{{old('wishInfo')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>

@endsection
