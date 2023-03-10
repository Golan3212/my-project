@extends('layouts.admin')
@section('title') Main @parent @stop
@section('content')

    <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered" style="width: 100%">
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
                @php $news = $newsItem  @endphp
                    <tr>
                        <td>{{$news->id}}</td>
                        <td>{{$news->title}}</td>
                        <td>{{$news->author}}</td>
                        <td>{{$news->status}}</td>
                        <td>{{$news->description}}</td>
                        <td>{{$news->created_at}}</td>
                        <td>
                            <a href="" style="color: #007bff; padding: 5px" > Edit</a>
                            <a href="" style="padding: 5px; color: darkred">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection

