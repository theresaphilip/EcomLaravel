@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.delcoupon').click(function(e){

            if(confirm("Are you sure you want to delete this?")){
                var cid=$(this).attr("cid");
                $.ajax({
                    url:"coupons/"+cid,
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
                    <h3 class="float-left">Manage Coupons</h3>
                    <a href="{{url('coupons/create')}}" class="float-right btn btn-success">Add Coupon</a>
                </div>
                <div class="card-body">
                    <table class="table text-dark" id="mytable">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col"> Coupon Code</th>
                                <th scope="col"> Amount</th>
                                <th scope="col"> Total Quantity</th>
                                <th scope="col"> Available Quantity</th>
                                <th scope="col"> Start At</th>
                                <th scope="col">Expire At</th>
                                <th scope="col"> Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn=1;
                            @endphp
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$sn}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->amount}}</td>
                                    <td>{{$coupon->total_quantity}}</td>
                                    <td>{{$coupon->available_quantity}}</td>
                                    <td>{{date("d-M-Y ",strtotime($coupon->start_at))}}</td>
                                    <td>{{date("d-M-Y ",strtotime($coupon->expire_at))}}</td>
                                    
                                        @if($coupon->status==1)
                                        <td>Active</td>
                                        @else
                                        <td>InActive</td>
                                    @endif
                                    <td>
                                        
                                        <a href="{{url('coupons/'.$coupon->id.'/edit')}}" class="btn btn-warning text-white mr-2" >Update</a>
                                        <a href="javascript:void(0)" cid="{{$coupon->id}}" class="btn btn-danger mr-2 delcoupon">Delete</a>
                                    </td>
                                </tr>
                                @php
                                    $sn++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                  {{-- <span>{{$coupons->links()}}</span> --}}
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