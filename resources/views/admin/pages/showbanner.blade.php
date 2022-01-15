@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.delbanner').click(function(e){

            if(confirm("Are you sure you want to delete this?")){
                var cid=$(this).attr("cid");
                $.ajax({
                    url:"banners/"+cid,
                    type:'delete',
                    data:{_token:'{{csrf_token()}}',cid:cid},
                    success:function(response){
                     
                        $("#mytable").load(location.href + " #mytable");
                    }
                });
            }
    else{
        return false;
    }   
        });
    });
</script>
<div class="container-fluid mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Manage Banners</h3>
                    <a href="{{url('banners/create')}}" class="float-right btn btn-success">Add Banner</a>
                </div>
                <div class="card-body">
                    <table class="table text-dark" id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col"> Caption</th>
                                <th scope="col"> Image</th>
                                <th scope="col"> Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn=1;
                            @endphp
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{$sn}}</td>
                                    <td>{{$banner->caption}}</td>
                                    <td>
                                    <img src="{{asset('/uploads/'.$banner->image)}}" width="50" height="50"><br>
                                    </td>
                                    @if($banner->status==1)
                                        <td>Active</td>
                                        @else
                                        <td>InActive</td>
                                    @endif
                                    <td>
                                        <a href="{{url('banners/'.$banner->id.'/edit')}}" class="btn btn-warning text-white mr-2" >Update</a>
                                        <a href="javascript:void(0)" cid="{{$banner->id}}" class="btn btn-danger mr-2 delbanner">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $sn++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                  <span>{{$banners->links()}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .w-5{
        display:none;
    }
</style>