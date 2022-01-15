@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="jumbotron text-center text-dark">Update Banner</h1>
                <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                <form method="post" action="{{url('banners/'.$banner->id)}}" enctype="multipart/form-data">
                    @csrf()
                    @method('PUT')
                    <div class="form-group">
                        <label for="caption">Caption<span class="error">*</span></label>
                        <input type="text" class="form-control" id="caption" name="caption"  placeholder="Enter caption" value="{{$banner->caption}}">
                        @if($errors->has('caption'))
                            <label  class="alert alert-danger">{{$errors->first('caption')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image<span class="error">*</span></label>
                        <input type="file" class="form-control"  name="image" >
                        <img src="{{asset('/uploads/'.$banner->image)}}" width="50" height="50"><br>
                        @if($errors->has('image'))
                            <label  class="alert alert-danger">{{$errors->first('image')}}</label>
                        @endif
                    </div>
                    <div>
                        <label for="status">Status<span class="error">*</span></label>
                   </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="active" name="status" class="custom-control-input" value="1" {{ ($banner->status=="1")? "checked" : "" }}>
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="inactive" name="status" class="custom-control-input" value="0" {{ ($banner->status=="0")? "checked" : "" }}>
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                    @if($errors->has('status'))
                            <label  class="alert alert-danger">{{$errors->first('status')}}</label>
                        @endif
                    <div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-warning">Update Banner</button>
                        <a href="{{url('banners')}}" class="btn btn-primary">Back</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection