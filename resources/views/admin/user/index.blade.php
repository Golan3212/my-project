@extends('layouts.admin')
@section('title') Main @parent @stop
@section('content')

    <div class="container-fluid">
        <div class="row">
            <table class="table table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Is admin</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @forelse($userList as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->is_admin}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a href="{{route('admin.user.edit', ['user'=>$user])}}" style="color: #007bff; padding: 5px" > Edit</a>
                            <a href="javascript:;" class="delete" rel="{{$user->id}}" style="padding: 5px; color: darkred">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            Have no users
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{$userList->Links()}}
    </div>


@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function () {
                    const id = this.getAttribute('rel');
                    if (confirm(`R u sure about delete user with #ID = ${id}`)) {
                        deleteItem(`user/${id}`).then(() => {
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


