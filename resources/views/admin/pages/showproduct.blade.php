@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.delpro').click(function(e){

            if(confirm("Are you sure you want to delete this?")){
                var cid=$(this).attr("cid");
                $.ajax({
                    url:"products/"+cid,
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
                    <h3 class="float-left">Manage Products</h3> 
                    <a href="{{url('products/create')}}" class="float-right btn btn-success">Add Product</a>
                </div>
                <div class="card-body">
                    <table class="table text-dark text-center" id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">Sr.NO</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Features</th>
                                <th scope="col">Images</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn=1;
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$sn}}</td>
                                    <td>{{$product->ProductCategory->Category->name}}</td>
                                    <td>{{$product->pname}}</td>
                                   <td>{{$product->ProductAttributeAssoc->price}}</td>
                                    <td>{{$product->ProductAttributeAssoc->quantity}}</td>
                                   <td>{{$product->ProductAttributeAssoc->features}}</td>
                                   <td>
                                    @foreach($product->ProductImage as $image)
                                    <img src="{{asset('/uploads/'.$image->images)}}" alt="image" width="50" height="50">  
                                    <a href="{{url('/deleteimages/'.$image->id)}}"  class="btn text-danger  mt-2" onclick="return deleteConfirm()"><i class="fas fa-trash-alt"></i></a>                               
                            
                                       
                                    @endforeach 
                                </td>
                                    <td>
                                        <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-warning text-white mr-1" >Update</a>
                                        <a href="javascript:void(0)" cid="{{$product->id}}" class="btn btn-danger mr-1 delpro">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $sn++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
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