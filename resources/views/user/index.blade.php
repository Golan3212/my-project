@extends('layouts.userActions')
@section('content')
    <div class="row mb-2" style="justify-content: space-around">
        <a href="{{route('user.feedback.create')}}" style="border: 2px solid cornflowerblue;padding: 10px; border-radius: 10px">Feedback</a>
        <a href="{{route('user.download.create')}} " style="border: 2px solid cornflowerblue;padding: 10px; border-radius: 10px">Download resources</a>
    </div>
@endsection

