@extends('layouts.app')

@section('title', 'User Profile: ' . $user['name'])

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">User Profile</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/PFP ALL.png') }}" alt="Profile Image" class="rounded-circle" style="max-width: 200px;>
                    </div>

                    <div class="mb-3">
                        <h5 class="card-title">{{ $user['name'] }}</h5>
                        <p class="text-muted">User ID: {{ $user['id'] }}</p>
                    </div>

                    <table class="table">
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user['email'] }}</td>
                        </tr>
                        <tr>
                            <th>Joined Date:</th>
                            <td>{{ $user['joined_date'] }}</td>
                        </tr>
                    </table>

                    <div class="d-grid gap-2">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
