@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <h1 class="jumbotron text-center text-dark">Update Configuration</h1>
        <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <form method="post" action="{{url('configurations/'.$conf->id)}}">
                    @csrf()
                    @method('PUT')
                    <div class="form-group">
                        <label for="admin_email">Admin Email </label>
                        <input type="text" class="form-control" id="admin_email" name="admin_email"  placeholder="Enter admin email" value="{{$conf->admin_email}}" >
                        @if($errors->has('admin_email'))
                            <label  class="alert alert-danger">{{$errors->first('admin_email')}}</label>
                        @endif
                    </div>  
                    <div class="form-group">
                        <label for="notification_email">Notification Email </label>
                        <input type="text" class="form-control" id="notification_email" name="notification_email"  placeholder="Enter notification email" value="{{$conf->notification_email}}">
                        @if($errors->has('notification_email'))
                            <label  class="alert alert-danger">{{$errors->first('notification_email')}}</label>
                        @endif
                    </div>   
                    <div class="mt-2">
                        <button type="submit" class="btn btn-warning">Update Notification Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
               