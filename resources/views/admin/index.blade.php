
@extends('layouts.admin')
@section('title') Main @parent @stop
@section('content')

{{--    <h2>Admin features</h2>--}}

{{--    <x-alert type="info" message="info message"></x-alert>--}}
{{--    <x-alert type="danger" message="danger message"></x-alert>--}}
{{--    <x-alert type="warning" message="warning message"></x-alert>--}}

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->author}}</td>
                    <td>{{$news->status}}</td>
                    <td>{{$news->description}}</td>
                    <td>{{$news->created_at}}</td>
                    <td>
                        <a href="{{}}" style="color: #007bff; padding: 5px" > Edit</a>
                        <a href="" style="padding: 5px; color: darkred">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        Have no news
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </main>
    </div>
</div>


@endsection
