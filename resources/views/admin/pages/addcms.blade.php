@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <h1 class=" bg jumbotron text-center text-white">Add CMS</h1>
    <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
          
            <form method="post" action="{{url('cms')}}" enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"  placeholder="Enter title">
                        @if($errors->has('title'))
                            <label  class="alert alert-danger">{{$errors->first('title')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <textarea name="body" class="form-control" placeholder="Enter body"></textarea>
                            @if($errors->has('body'))
                                <label class="alert alert-danger">{{$errors->first('body')}}</label>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control"  name="image" >
                        @if($errors->has('image'))
                            <label  class="alert alert-danger">{{$errors->first('image')}}</label>
                        @endif
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-success">Add CMS</button>
                        
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection