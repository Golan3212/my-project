@extends('layouts.app')
@section('content')
    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center; gap: 20px;
    border: 3px solid #007bff; margin-left: 25em; border-radius: 15px; width: 50%; background-color: #abdde5">
        <h2> Welcome {{Auth::user()->name}}</h2>
        <br>
        @if(Auth::user()->avatar)
            <img src="{{Auth::user()->avatar}}" style="width: 200px">
        @endif
        <br>
        @if(Auth::user()->is_admin === 1)
        <a href="{{route('admin.index')}}"> To admin</a>
        @endif
    </div>

@endsection
