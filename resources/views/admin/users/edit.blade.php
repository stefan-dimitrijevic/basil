@extends('layouts.admin')

@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Edit User</h2>
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="form-group" id="email-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group" id="role-group">
                                <label for="role-group">Role</label>
                                @foreach($roles as $role)
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            @if($role->id == $user->role->id)
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
                            <input type="hidden" id="id" value="{{ $user->id }}">
                            <button type="button" class="btn btn-primary" id="update-user" name="update-user">Update User
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
