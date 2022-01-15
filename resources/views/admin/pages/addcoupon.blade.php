@extends('admin.master')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class=" jumbotron text-center text-dark">Add Coupon</h1>
                <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    <form method="post" action="{{url('coupons')}}">
                        @csrf()
                        <div class="form-group">
                            <label>Code<span class="error">*</span></label>
                            <input type="text" name="code" class="form-control" placeholder="Enter code"/>
                            @if($errors->has('code'))
                                <label class="alert alert-danger">{{$errors->first('code')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Amount<span class="error">*</span></label>
                            <input type="text" name="amount" class="form-control" placeholder="Enter amount"/>
                            @if($errors->has('amount'))
                                <label class="alert alert-danger">{{$errors->first('amount')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Total Quantity<span class="error">*</span></label>
                            <input type="text" name="total_quantity" class="form-control" placeholder="Enter total quantity"/>
                            @if($errors->has('total_quantity'))
                                <label class="alert alert-danger">{{$errors->first('total_quantity')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Available Quantity<span class="error">*</span></label>
                            <input type="text" name="available_quantity" class="form-control" placeholder="Enter available quantity"/>
                            @if($errors->has('available_quantity'))
                                <label class="alert alert-danger">{{$errors->first('available_quantity')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Start At<span class="error">*</span></label>
                            <input type="date" name="start_at" class="form-control" placeholder="Enter start date"/>
                            @if($errors->has('start_at'))
                                <label class="alert alert-danger">{{$errors->first('start_at')}}</label>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Expire At<span class="error">*</span></label>
                            <input type="date" name="expire_at" class="form-control" placeholder="Enter expiry date"/>
                            @if($errors->has('expire_at'))
                                <label class="alert alert-danger">{{$errors->first('expire_at')}}</label>
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
                            <button type="submit" class="btn btn-success">Add Coupon</button>
                            <a href="{{url('coupons')}}" class="btn btn-primary">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection