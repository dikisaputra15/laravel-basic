@extends('admin.admin_master')
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
        </div>
        <div class="card-body">
            <form class="form-fill" method="POST" action="{{ route('password.update') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">User Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">User Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user['email'] }}">
                </div>
                
                
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection