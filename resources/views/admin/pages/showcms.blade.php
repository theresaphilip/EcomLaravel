@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.delcms').click(function(e){

            if(confirm("Are you sure you want to delete this?")){
                var cid=$(this).attr("cid");
                $.ajax({
                    url:"cms/"+cid,
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
                    <h3 class="float-left">Manage CMS</h3>
        <a href="{{url('cms/create')}}" class="float-right btn btn-success">Add Cms</a>
    </div>
    <div class="card-body">
        <table class="table text-dark" id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col"> Caption</th>
                                <th scope="col"> Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn=1;
                            @endphp
                            @foreach($cmss as $cms)
                                <tr>
                                    <td>{{$sn}}</td>
                                    <td>{{$cms->title}}</td>
                                    <td>{{$cms->body}}</td>
                                    <td>
                                    <img src="{{asset('/uploads/'.$cms->image)}}" width="50" height="50"><br>
                                    </td>
                                    <td>
                                        <a href="{{url('cms/'.$cms->id.'/edit')}}" class="btn   mr-2" ><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" cid="{{$cms->id}}" class="btn text-danger  mt-2 delcms"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $sn++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                  <span>{{$cmss->links()}}</span>
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