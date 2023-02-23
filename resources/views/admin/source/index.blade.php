@extends('layouts.admin')
    @section('title') Main @parent @stop
    @section('content')

        <div class="container-fluid">
            <h2>Sources</h2>
            <a href="{{route('admin.source.create')}}" style="border: 2px solid #007bff; margin: 15px">Add source</a>
            <div class="row" style="margin-top: 10px">
                <table class="table table-bordered" style="width: 100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Path</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($sourceList as $source)
                        <tr>
                            <td>{{$source->id}}</td>
                            <td>{{$source->name}}</td>
                            <td>{{$source->path}}</td>
                            <td>{{$source->created_at}}</td>
                            <td>
                                <a href="{{route('admin.source.edit', ['source'=>$source])}}" style="color: #007bff; padding: 5px" > Edit</a>
                                <a href="javascript:;" class="delete" rel="{{$source->id}}" style="padding: 5px; color: darkred">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                Have no sources
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    @push('js')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                let elements = document.querySelectorAll(".delete");
                elements.forEach(function (e, k) {
                    e.addEventListener("click", function () {
                        const id = this.getAttribute('rel');
                        if (confirm(`R u sure about delete source with #ID = ${id}`)) {
                            deleteItem(`source/${id}`).then(() => {
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
@endsection
