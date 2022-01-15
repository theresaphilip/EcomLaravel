@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="jumbotron py-4 text-center text-dark">Add User</h1>
                <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <form method="post" action="{{url('users')}}">
                    @csrf()
                    <div class="form-group">
                        <label for="firstname">First Name<span class="error">*</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname"  placeholder="Enter firstname">
                        @if($errors->has('firstname'))
                            <label  class="alert alert-danger">{{$errors->first('firstname')}}</label>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name<span class="error">*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter lastname">
                        @if($errors->has('lastname'))
                            <label  class="alert alert-danger">{{$errors->first('lastname')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email address<span class="error">*</span></label>
                        <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email">
                        @if($errors->has('email'))
                            <label  class="alert alert-danger">{{$errors->first('email')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span class="error">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        @if($errors->has('password'))
                            <label  class="alert alert-danger">{{$errors->first('password')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password<span class="error">*</span></label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder=" Enter Confirm Password">
                        @if($errors->has('cpassword'))
                            <label  class="alert alert-danger">{{$errors->first('cpassword')}}</label>
                        @endif
                    </div>
                    <div>
                         <label for="status">Status<span class="error">*</span></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="active" name="status" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="inactive" name="status" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                    @if($errors->has('status'))
                            <label  class="alert alert-danger">{{$errors->first('status')}}</label>
                        @endif
                    <div>
                        <label for="role">Role<span class="error">*</span></label>
                       
                        <select class="form-control" name="role">
                        <option value="" disables selected>Select type</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        
                            <!-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="role" value="{{$role->id}}" @if($role->id==5) checked @endif >
                                <label class="form-check-label" for="{{$role->id}}">{{$role->role_name}}</label>
                            </div> -->
                       
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-success">Add User</button>
                        <a href="{{url('users')}}" class="btn btn-primary">Back</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection