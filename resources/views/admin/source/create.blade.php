@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{route('admin.source.store')}}">
        @csrf
        <div>
            <label for="name">Header</label>
            <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Type name">
        </div>
        <div class="form-group">
            <label for="path">Author</label>
            <input type="text" class="form-control" value="{{old('path')}}" name="path" id="path" placeholder="Type path">
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>

@endsection
