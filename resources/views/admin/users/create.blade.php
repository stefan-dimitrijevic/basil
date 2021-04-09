@extends('layouts.admin')

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Create User</h2>
        </div>
    </div>
    <div class="content">
        <div class="row admin-content">
            <div class="col-sm-7 col-md-5 col-lg-7 col-xl-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form id="user-form">
                            <div class="form-group" id="name-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group" id="email-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group" id="password-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group" id="role-group">
                                <label for="role-group">Role</label>
                                @foreach($roles as $role)
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            @if($role->id == 1)
                                                <input class="form-check-input" type="radio" name="role"
                                                       id="role{{ $role->id }}" value="{{ $role->id }}" checked>{{ $role->role }}
                                            @else
                                            <input class="form-check-input" type="radio" name="role"
                                                   id="role{{ $role->id }}" value="{{ $role->id }}">{{ $role->role }}
                                            @endif
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-primary" id="add-user" name="add-user">Add User
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card error-card">
                    <div class="card-body">
                        <div class="errors">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
