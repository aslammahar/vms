@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Profile</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>

    <form action="{{ route('profile.destroy') }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
