@extends('layouts.admin')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

        <h1>Edit source</h1>
    <form method="post" action="{{route('admin.source.update', ['source'=>$source])}} " enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label for="name">Header</label>
            <input type="text" class="form-control" value="{{$source->name}}" name="name" id="name" placeholder="Type name">
        </div>
        <div class="form-group">
            <label for="path">Author</label>
            <input type="text" class="form-control" value="{{$source->path}}" name="path" id="path" placeholder="Type author">
        </div>
        <button type="submit" class="btn btn-primary mb-2 btn-success">Send</button>
    </form>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endpush
