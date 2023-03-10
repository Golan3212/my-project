@extends('layouts.userActions')
@section('content')

    <h1>userDownload</h1>
    <section class="jumbotron text-center">
        <div class="container">
            <h2 class="jumbotron-heading">Download requests by user</h2>
{{--                <a href="#" class="btn btn-primary my-2">Check another user</a>--}}
                <a href="{{route('user.download.create')}}" class="btn btn-secondary my-2">New download request</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @forelse($downloadData as $downloadItem)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px70?theme=thumb&bg=55595c&fg=eceeef&text=
                        {{$downloadItem->username}}
                        " alt="Card image cap">
                        <img class="card-img-top" data-src="holder.js/100px70?theme=thumb&bg=55595c&fg=eceeef&text=
                        {{$downloadItem->phone}}
                        " alt="Card image cap">
                        <img class="card-img-top" data-src="holder.js/100px70?theme=thumb&bg=55595c&fg=eceeef&text=
                        {{$downloadItem->email}}
                        " alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{$downloadItem->comment_to_get}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('user.download.edit', ['download' => $downloadItem])}}" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <a href="javascript:;"  rel="{{$downloadItem->id}}" class="delete btn btn-sm btn-outline-secondary">Delete</a>
                                </div>
                                <small class="text-muted">{{$downloadItem->created_at}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div>
                    <h3> Have no requests</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function () {
                    const id = this.getAttribute('rel');
                    if (confirm(`R u sure about delete request with #ID = ${id}`)) {
                        deleteItem(`download/${id}`).then(() => {
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
