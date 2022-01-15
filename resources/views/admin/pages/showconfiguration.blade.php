@extends('admin.master')
@section('content')
<div class="container-fluid mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Manage Configuration</h3>
                                <a href="{{url('configurations/create')}}" class="btn btn-success float-right ">Add Configuration</a>
                            </div>
                            <div class="card-body">
                            <table class="table " id="mytable">
                            <thead>
                                <tr>
                                    <th scope="col">S.no</th>
                                    <th scope="col">Admin Email</th>
                                    <th scope="col">Notification Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn=1;
                                @endphp
                                @foreach($conf as $con)
                                    <tr>
                                        <td>{{$sn}}</td>
                                        <td>{{$con->admin_email}}</td>
                                        <td>{{$con->notification_email}}</td>
                                        <td>
                                            <a href="{{url('configurations/'.$con->id.'/edit')}}" class="btn mr-2" >
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
                
