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
                            <h3 class="mb-0">Edit Company</h3>
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
                    <form action="{{ route('Company.update',$Company->id) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company">Company:*</label>
                                        <input type="text" id="company" name="company" style="width: 100%;" value="{{old('company') ?? $Company->company ?? $Company->company}}" placeholder="Enter company name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_phone">Phone:</label>
                                        <input type="number" id="company_phone" name="company_phone" style="width: 100%;" value="{{old('company_phone') ?? $Company->company_phone}}" placeholder="Enter company phone">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="site">Site:*</label>
                                        <input type="text" id="site" name="site" style="width: 100%;" value="{{old('site') ?? $Company->site}}" placeholder="Enter site">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="fax">Fax:</label>
                                        <input type="text" id="fax" name="fax" style="width: 100%;" value="{{old('fax') ?? $Company->fax}}" placeholder="Enter fax">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="address1">Address 1:</label>
                                        <input type="text" id="address1" name="address1" style="width: 100%;" value="{{old('address1') ?? $Company->address1}}" placeholder="Enter address">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="website">Website:</label>
                                        <input type="text" id="website" name="website" style="width: 100%;" value="{{old('website') ?? $Company->website}}" placeholder="Enter website">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="address2">Address 2:</label>
                                        <input type="text" id="address2" name="address2" style="width: 100%;" value="{{old('address2') ?? $Company->address2}}" placeholder="Enter address">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn:</label>
                                        <input type="text" id="linkedin" name="linkedin" style="width: 100%;" value="{{old('linkedin') ?? $Company->linkedin}}" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" id="city" name="city" style="width: 100%;" value="{{old('city') ?? $Company->city}}" placeholder="Enter city">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text" id="facebook" name="facebook" style="width: 100%;" value="{{old('facebook') ?? $Company->facebook}}" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="state">State:</label>
                                        <input type="text" id="state" name="state" style="width: 100%;" value="{{old('state') ?? $Company->state}}" placeholder="Enter state dropdown (tbd)">
                                    </div>
                                </div>
                                <div class="col-6">   
                                    <div class="form-group">
                                        <label for="twitter">Twitter:</label>
                                        <input type="text" id="twitter" name="twitter" style="width: 100%;" value="{{old('twitter') ?? $Company->twitter}}" placeholder="Enter URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="zip">Zip:</label>
                                        <input type="text" id="zip" name="zip" style="width: 100%;" value="{{old('zip') ?? $Company->zip}}" placeholder="Enter zip">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" id="country" name="country" style="width: 100%;" value="{{old('country') ?? $Company->country}}" placeholder="Enter country dropdown (tbd)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sharepoint">SharePoint Folder:</label>
                                        <input type="text" id="sharepoint" name="sharepoint" style="width: 100%;" value="{{old('sharepoint') ?? $Company->sharepoint}}" placeholder="Enter sharepoint">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_contract_type">Customer Contract Type:</label>
                                        <input type="text" id="customer_contract_type" name="customer_contract_type" style="width: 100%;" value="{{old('customer_contract_type') ?? $Company->customer_contract_type}}" placeholder="Enter customer contract type dropdown (tbd)">
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
                                        <input type="text" id="company_id" name="company_id" style="width: 100%;" value="{{old('company_id') ?? $Company->company_id}}" placeholder="Enter company id">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status">Status*</label>
                                        <select style="width: 100%" id="status" name="status" value="{{old('status')}}">
                                            <option disabled selected>Select any one</option>
                                            <option value="1" {{($Company->status == '1') ? 'selected ="selected"' : ''  }}>Not Approved</option>
                                            <option value="2" {{($Company->status == '2') ? 'selected ="selected"' : ''  }}>Approved</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="territory">Territory:</label>
                                        <input type="text" id="territory" name="territory" style="width: 100%;" value="{{old('territory') ?? $Company->territory}}" placeholder="Enter territory (dropdown tbd)">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="account_id">Account ID:</label>
                                        <input type="text" id="account_id" name="account_id" style="width: 100%;" value="{{old('account_id') ?? $Company->account_id}}" placeholder="Enter account id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="market">Market:</label>
                                        <input type="text" id="market" name="market" style="width: 100%;" value="{{old('market') ?? $Company->market}}" placeholder="Enter market (dropdown tbd)">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="vendor_id">Vendor ID:</label>
                                        <input type="text" id="vendor_id" name="vendor_id" style="width: 100%;" value="{{old('vendor_id') ?? $Company->vendor_id}}" placeholder="Enter vendor id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="primary_sales">Primary Sales Rep:</label>
                                        <select style="width: 100%" id="primary_sales" name="primary_sales" value="{{old('primary_sales')}}">
                                            <option disabled selected>Select any one</option>
                                            @foreach($SalesPerson as $row)
                                                <option value="{{ $row->id }}" {{($Company->primary_sales == $row->id) ? 'selected ="selected"' : ''  }}>{{ $row->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="date_acquired">Date Acquired:</label>
                                        <input type="text" id="date_acquired" name="date_acquired" style="width: 100%;" value="{{old('date_acquired') ?? $Company->date_acquired}}" placeholder="Enter date acquired">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="secondary_sales">Secondary Sales Rep:</label>
                                        <select style="width: 100%" id="secondary_sales" name="secondary_sales" value="{{old('secondary_sales')}}">
                                            <option disabled selected>Select any one</option>
                                            @foreach($SalesPerson as $row)
                                                <option value="{{ $row->id }}" {{($Company->secondary_sales == $row->id) ? 'selected ="selected"' : ''  }}>{{ $row->first_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="not_a_fit_reason">Not a Fit Reason:</label>
                                        <select style="width: 100%" id="not_a_fit_reason" name="not_a_fit_reason" value="{{old('not_a_fit_reason')}}">
                                            <option disabled selected>Select any one</option>
                                            <option value="1" {{($Company->not_a_fit_reason == '1') ? 'selected ="selected"' : ''  }}>Customer say no</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_billing_contact">Customer Billing Contact:</label>
                                        <input type="text" id="customer_billing_contact" name="customer_billing_contact" style="width: 100%;" value="{{old('customer_billing_contact') ?? $Company->customer_billing_contact}}" placeholder="Enter customer billing contact">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_billing_email">Customer Billing Email:</label>
                                        <input type="email" id="customer_billing_email" name="customer_billing_email" style="width: 100%;" value="{{old('customer_billing_email') ?? $Company->customer_billing_email}}" placeholder="Enter customer billing email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_billing_phone">Customer Billing Phone:</label>
                                        <input type="number" id="customer_billing_phone" name="customer_billing_phone" style="width: 100%;" value="{{old('customer_billing_phone') ?? $Company->customer_billing_phone}}" placeholder="Enter customer billing phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_sales_contact">Customer Sales Contact:</label>
                                        <input type="text" id="customer_sales_contact" name="customer_sales_contact" style="width: 100%;" value="{{old('customer_sales_contact') ?? $Company->customer_sales_contact}}" placeholder="Enter customer sales contact">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_sales_email">Customer Sales Email:</label>
                                        <input type="email" id="customer_sales_email" name="customer_sales_email" style="width: 100%;" value="{{old('customer_sales_email') ?? $Company->customer_sales_email}}" placeholder="Enter customer sales email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer_sales_phone">Customer Sales Phone:</label>
                                        <input type="number" id="customer_sales_phone" name="customer_sales_phone" style="width: 100%;" value="{{old('customer_sales_phone') ?? $Company->customer_sales_phone}}" placeholder="Enter customer sales phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="type">Type*:</label>
                                        <input type="text" id="type" name="type" style="width: 100%;" value="{{old('type') ?? $Company->type}}" placeholder="Enter type (tbd)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h3>Primary Contact</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" style="width: 100%;" value="{{old('name') ?? $Company->name}}" placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" style="width: 100%;" value="{{old('email') ?? $Company->email}}" placeholder="Enter email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" id="title" name="title" style="width: 100%;" value="{{old('title') ?? $Company->title}}" placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="relationship">Relationship:</label>
                                        <input type="text" id="relationship" name="relationship" style="width: 100%;" value="{{old('relationship') ?? $Company->relationship}}" placeholder="Enter relationship dropdown (tbd)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="phone" name="phone" style="width: 100%;" value="{{old('phone') ?? $Company->phone}}" placeholder="Enter phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="primary_type">Type*:</label>
                                        <input type="text" id="primary_type" name="primary_type" style="width: 100%;" value="{{old('primary_type') ?? $Company->primary_type}}" placeholder="Enter primary type (tbd)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h3>Company Team</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="account_manager">Account Manager:</label>
                                        <input type="text" id="account_manager" name="account_manager" style="width: 100%;" value="{{old('account_manager') ?? $Company->account_manager}}" placeholder="Enter account manager dropdown (tbd)">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="primary_tech">Primary Tech:</label>
                                        <input type="text" id="primary_tech" name="primary_tech" style="width: 100%;" value="{{old('primary_tech') ?? $Company->primary_tech}}" placeholder="Enter primary tech dropdown (tbd)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sales_orginator">Sales Orginator:</label>
                                        <input type="text" id="sales_orginator" name="sales_orginator" style="width: 100%;" value="{{old('sales_orginator') ?? $Company->sales_orginator}}" placeholder="Enter sales orginator dropdown (tbd)">
                                    </div>
                                </div>
                            </div>
                        <div style="display: flex;justify-content: flex-end;">
                            <input class="btn btn-success upload-result" type="submit" value="UPDATE" style="margin-top: 22px">
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
