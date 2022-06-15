@extends('layouts.admin')
@section('title','user-edit')

@section('content')
    @include('inc.success')
    <h3>{{$user->full_name}}</h3>
    <form id="userEdit" method="post">
        @csrf
        @method('PATCH')
        <select class="form-select" id="selectRole">
            @foreach($roles as $role)
                <option value="{{$role->id}}" {{$role->id == $user->role_id ? 'selected' : ''}}>{{$role->role}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-primary mt-2">Обновить</button>
    </form>
@endsection
@push('child-scripts')
    <script>
        async function updateUser(route, data, _token) {
            let response = await fetch(route, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json;charset=UTF-8'
                },
                body: JSON.stringify({data, _token})
            });
            return await response.json();
        }

        document.querySelector('#userEdit').addEventListener('submit', async (e) => {
            e.preventDefault();
            let data = await updateUser("{{route('admin.users.update',$user)}}", selectRole.value, '{{csrf_token()}}')
            console.log(data);
        })
    </script>
@endpush

