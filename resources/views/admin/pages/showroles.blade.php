@extends('admin.master')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1 class="text-dark">Roles</h1></div>
                <div class="card-body">
   
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($role as $roles)
                <tr>
                    <td>{{$roles->role_id}}</td>
                    <td>{{$roles->role_name}}</td>
                    {{-- <td>
                        <a href="" class="btn btn-danger">Delete</a>
                        <a href="" class="btn btn-info">Edit</a>
                    </td> --}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
@endsection