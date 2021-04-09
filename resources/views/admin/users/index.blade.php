@extends('layouts.admin')

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Users</h2>
        </div>
    </div>
    <div class="content">
        <div class="row admin-content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.users.create') }}">
                            <button type="button" class="btn btn-primary">Create User</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center" id="table-row-{{ $user->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->role }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('admin.users.edit', $user->id) }}">
                                                <button type="button" rel="tooltip"
                                                        class="btn btn-success btn-sm btn-icon btn-update-user"
                                                        data-id="{{ $user->id }}">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                            </a>
                                            <button type="button" rel="tooltip"
                                                    class="btn btn-danger btn-sm btn-icon btn-delete-user"
                                                    data-id="{{ $user->id }}">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
