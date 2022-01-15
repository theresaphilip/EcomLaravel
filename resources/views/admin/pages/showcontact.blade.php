@extends('admin.master')
@section('content')
<div class="container-fluid mt-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                
                            <table class="table " id="mytable">
                                <div class="text-center">
                                    <h2 class="text-primary">Contact Details</h2>
                                </div>
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.NO</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sn=1;
                                    @endphp
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{$sn}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->mobile}}</td>
                                            <td>{{$contact->message}}</td>
                                        </tr>
                                        @php
                                            $sn++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <span>{{$contacts->links()}}</span>
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