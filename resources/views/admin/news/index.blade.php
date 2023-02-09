@extends('layouts.admin')
@section('title') Main @parent @stop
@section('content')

    <div class="container-fluid">
        <a href="{{route('admin.news.create')}}" style="border: 2px solid #007bff;">Add news</a>
        <div class="row">
                <table class="table table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Created_at</th>
                        <th>Source</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($newsList as $news)
                        <tr>
                            <td>{{$news->id}}</td>
                            <td>{{$news->categories->map(fn($item) => $item->title)->implode(",")}}</td>
                            <td>{{$news->title}}</td>
                            <td>{{$news->author}}</td>
                            <td>{{$news->status}}</td>
                            <td>{{$news->description}}</td>
                            <td>{{$news->created_at}}</td>
                            <td>{{$news->sources->name}}</td>
                            <td>
                                <a href="{{route('admin.news.edit', ['news'=>$news])}}" style="color: #007bff; padding: 5px" > Edit</a>
                                <a href="javascript:;" class="delete" rel="{{$news->id}}" style="padding: 5px; color: darkred">Delete</a>
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
        </div>
        {{$newsList->Links()}}
    </div>


@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function () {
                    const id = this.getAttribute('rel');
                    if (confirm(`R u sure about delete news with #ID = ${id}`)) {
                        deleteItem(`news/${id}`).then(() => {
                            location.reload();
                        });
                    }else{
                        alert('Delete decline');
                    }
                })

            })
        })

        async function deleteItem(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush

