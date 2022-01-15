@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="jumbotron text-center text-dark">Update Category</h1>
                <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    <form method="post" action="{{url('categories/'.$cat->id)}}">
                        @csrf()
                        @method('PUT')
                        <div class="form-group">
                            <label>Name<span class="error">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$cat->name}}"/>
                             @if($errors->has('name'))
                                <label class="alert alert-danger">{{$errors->first('name')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Description<span class="error">*</span></label>
                            <textarea name="description" class="form-control" placeholder="Enter description">{{$cat->description}}</textarea>
                            @if($errors->has('description'))
                                <label class="alert alert-danger">{{$errors->first('description')}}</label>
                            @endif
                        </div>
                        <div>
                            <label for="status">Status<span class="error">*</span></label>
                       </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="active" name="status" class="custom-control-input" value="1" {{ ($cat->status=="1")? "checked" : "" }}>
                            <label class="custom-control-label" for="active">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="inactive" name="status" class="custom-control-input" value="0" {{ ($cat->status=="0")? "checked" : "" }}>
                            <label class="custom-control-label" for="inactive">Inactive</label>
                        </div>
                        @if($errors->has('status'))
                                <label  class="alert alert-danger">{{$errors->first('status')}}</label>
                            @endif
                        <div>
                        <div>
                            <button type="submit" class="btn btn-warning">Update Category</button>
                            <a href="{{url('categories')}}" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection