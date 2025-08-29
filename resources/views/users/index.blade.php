@extends('layouts.template')


@section('title', 'Users')

@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add User</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $u) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('users.destroy', $u) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete user {{ $u->name }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No users yet.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
