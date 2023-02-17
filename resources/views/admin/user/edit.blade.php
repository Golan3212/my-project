@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <h1>Edit User</h1>
    <form method="post" action="{{route('admin.user.update', ['user'=>$user])}}">
        @csrf
        @method('put')
        <div>
            <h5>Name</h5>
            <strong>{{$user->name}}</strong>
        </div>
        <br>
        <div>
            <h5>Email</h5>
            <strong>{{$user->email}}</strong>
        </div>
        <br>
        <div>
            <h5>Created_at</h5>
            <strong>{{$user->created_at}}</strong>
        </div>
        <br>
        <div class="form-check">

            @if($user->is_admin === 1)
                <input class="input form-check-input" name="is_admin" type="checkbox" value="{{$user->is_admin}}" id="is_admin">
                <label class="form-check-label" for="is_admin">
                    Delete admin
                </label>
            @else
                <input class="input form-check-input" name="is_admin" type="checkbox" value="{{$user->is_admin}}" id="is_admin">
                <label class="form-check-label" for="is_admin">
                    Do admin
                </label>
            @endif

        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success" style="margin-top: 20px">Send</button>
    </form>
@endsection

@push('js2')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (){
            let formSend = document.querySelectorAll(".input");
            formSend.forEach(function (e, k) {
                e.addEventListener('click', function (){
                    const isAdmin = Number(this.getAttribute('value'));
                    if(isAdmin === 0){
                        return  this.value = 1

                    }else{
                        return  this.value = 0;
                    }
                })
            })
        });
    </script>
@endpush

