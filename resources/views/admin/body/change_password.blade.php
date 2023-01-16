@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form class="form-fill" method="POST" action="{{ route('password.update') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Current Password</label>
                    <input type="password" name="oldpassword" class="form-control" id="current_password" placeholder="Current Password">
                    @error('oldpassword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">New Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection