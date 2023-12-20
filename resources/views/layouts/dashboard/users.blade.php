@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="col-lg-6">
                    <form action="{{ route('adduser') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Admin Name</label>
                            <input type="text" class="form-control" placeholder="Admin Name" name="admin_name">
                        </div>
                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="text" class="form-control" placeholder="Admin Email" name="admin_email">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Admin</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive table-bordered">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width80">SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><strong>{{ $loop->iteration }}</strong></td>
                                        <td> {{ $user['name'] }}</td>
                                        <td> {{ $user['email'] }}</td>
                                        <td> {{ $user['role'] }}</td>
                                        <td><span class="badge light badge-success">{{ $user['created_at'] }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
