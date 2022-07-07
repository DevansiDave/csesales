@extends('layouts.app', ['title' => __('Company')])

@section('content') 
@include('layouts.headers.list-cards') 
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create Company</h3>
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
                    <form action="{{ route('Company.store') }}" method="post" enctype="multipart/form-data" >
                        @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company">Company:*</label>
                                        <input type="text" id="company" name="company" class="form-control" value="{{old('company')}}" placeholder="Enter company name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="estimated_cost" name="estimated_cost" class="form-control" value="{{old('estimated_cost')}}" placeholder="Enter estimated cost">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="site">Site:*</label>
                                        <input type="text" id="site" name="site" class="form-control" value="{{old('site')}}" placeholder="Enter site">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="site">Fax:</label>
                                        <input type="text" id="site" name="site" class="form-control" value="{{old('site')}}" placeholder="Enter site">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="address1">Address 1:</label>
                                        <input type="text" id="address1" name="address1" class="form-control" value="{{old('address1')}}" placeholder="Enter address">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="website">Website:</label>
                                        <input type="text" id="website" name="website" class="form-control" value="{{old('website')}}" placeholder="Enter website">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="address2">Address 2:</label>
                                        <input type="text" id="address2" name="address2" class="form-control" value="{{old('address2')}}" placeholder="Enter address">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn:</label>
                                        <input type="text" id="linkedin" name="linkedin" class="form-control" value="{{old('linkedin')}}" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" id="city" name="city" class="form-control" value="{{old('city')}}" placeholder="Enter city">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text" id="facebook" name="facebook" class="form-control" value="{{old('facebook')}}" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="state">State:</label>
                                        <input type="text" id="state" name="state" class="form-control" value="{{old('state')}}" placeholder="Enter state">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="twitter">Twitter:</label>
                                        <input type="text" id="twitter" name="twitter" class="form-control" value="{{old('twitter')}}" placeholder="Enter URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="zip">Zip:</label>
                                        <input type="text" id="zip" name="zip" class="form-control" value="{{old('zip')}}" placeholder="Enter zip">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" id="country" name="country" class="form-control" value="{{old('country')}}" placeholder="Enter country">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sharepoint">SharePoint Folder:</label>
                                        <input type="text" id="sharepoint" name="sharepoint" class="form-control" value="{{old('sharepoint')}}" placeholder="Enter sharepoint">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_contract_type">Customer Contract Type:</label>
                                        <input type="text" id="customer_contract_type" name="customer_contract_type" class="form-control" value="{{old('customer_contract_type')}}" placeholder="Enter customer contract type">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h3>Company Details</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_id">Company ID:</label>
                                        <input type="text" id="company_id" name="company_id" class="form-control" value="{{old('company_id')}}" placeholder="Enter company id">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <input type="text" id="status" name="status" class="form-control" value="{{old('status')}}" placeholder="Enter status dropdown tbd">
                                    </div>
                                </div>
                            </div>
                        <div style="float: right;">
                            <input class="btn btn-success upload-result" type="submit" value="SAVE" style="margin-top: 22px">
                            <a href="{{ route('Company.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
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
