@extends('layouts.app', ['title' => __('Sales Person')])

@section('content') 
@include('layouts.headers.list-cards') 
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create Sales Person</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('SalesPerson.store') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name*</label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value="{{old('first_name')}}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name*</label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{old('last_name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Primary Email*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="secondary_email">Secondary Email</label>
                            <input type="email" id="secondary_email" name="secondary_email" class="form-control" value="{{old('secondary_email')}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control" value="{{old('phone')}}">
                        </div>
                        <!-- <div class="form-group">
                            <label for="region">Region*</label>
                            <input type="text" id="region" name="region" class="form-control" value="{{old('region')}}">
                        </div> -->
                        <div class="form-group">
                            <label for="region">Region*</label>
                            <select class="custom-select form-control-border border-width-2" style="width: 100%" id="region" name="region" value="{{old('region')}}">
                                <option disabled selected>Select any one</option>
                                <option value="1">US</option>
                                <option value="2">India</option>
                                <option value="3">Philippines</option>
                                <option value="4">Equador</option>
                            </select>
                        </div>
                        <div style="float: right;">
                            <input class="btn btn-success upload-result" type="submit" value="SAVE" style="margin-top: 22px">
                            <a href="{{ route('SalesPerson.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
                        </div>
                    </form>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
