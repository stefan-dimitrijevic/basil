@extends('layouts.app')

@section('content')
    <div class="profile-photo">
        <div class="form-container">
            <div class="d-none d-md-table-cell image-holder"></div>
            <form style="background: #b9e4c9;">
                <h2 class="text-center"><strong>Edit</strong> profile.</h2>
                <div class="form-group">
                    <label for="name" class="form-text">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ session()->get('user')->name }}">
                </div>
                <div class="form-group">
                    <label for="passwordOld" class="form-text">Old password</label>
                    <input class="form-control" id="passwordOld"
                           type="password" name="passwordOld">
                </div>
                <div class="form-group">
                    <label for="password" class="form-text">New password</label>
                    <input class="form-control" id="password" type="password"
                           name="password">
                </div>
                <div class="form-group">
                    <label for="passwordConfirm" class="form-text">New password (repeat)</label>
                    <input class="form-control" id="passwordConfirm" type="password" name="password_confirmation"></div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="button"  id="btn-profile" style="background: #fd5523;">
                        Update profile
                    </button>
                </div>
                <input type="hidden" id="id" value="{{ session()->get('user')->id }}">
            </form>

        </div>
    </div>
@endsection
