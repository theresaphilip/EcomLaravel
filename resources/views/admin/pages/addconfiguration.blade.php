@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <h1 class=" bg jumbotron text-center text-dark">Add Configuration</h1>
    <div class="card-body">
                <form method="post" action="{{url('configurations')}}">
                    @csrf()
                    <div class="form-group">
                        <label for="admin_email">Admin Email </label>
                        <input type="text" class="form-control" id="admin_email" name="admin_email"  placeholder="Enter admin email" value="{{$conf->email}}" >
                     
                    </div>  
                    <div class="form-group">
                        <label for="notification_email">Notification Email </label>
                        <input type="text" class="form-control" id="notification_email" name="notification_email"  placeholder="Enter admin email" value="{{$conf->email}}">
                    
                    </div>   
                    <div class="mt-2">
                        <button type="submit" class="btn btn-warning">Add Notification Email</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
