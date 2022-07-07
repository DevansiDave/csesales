@extends('layouts.app', ['title' => __('Services Category')])

@section('content') 
@include('layouts.headers.list-cards') 
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create Services Category</h3>
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
                    <form action="{{ route('ServicesCategory.store') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="service_category_name">Services Category Name*</label>
                            <input type="text" id="service_category_name" name="service_category_name" class="form-control" value="{{old('service_category_name')}}" placeholder="Enter services category name">
                        </div>
                        <div style="float: right;">
                            <input class="btn btn-success upload-result" type="submit" value="SAVE" style="margin-top: 22px">
                            <a href="{{ route('ServicesCategory.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
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
