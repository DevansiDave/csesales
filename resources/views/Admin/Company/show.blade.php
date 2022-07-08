@extends('layouts.app', ['title' => __('Company')])

@section('content')
    @include('layouts.headers.list-cards')   
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <!-- <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Company Details</h3>
                        </div>
                    </div>
                </div> -->
                
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Company Overview</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th width="20%">Company:</th>
                        <td>{{ $Company->company }}</td>
                      </tr>
                      <tr>
                        <th>Site:</th>
                        <td>{{ $Company->site }}</td>
                      </tr>
                      <tr>
                        <th>Address 1:</th>
                        <td>{{ $Company->address1 }}</td>
                      </tr>
                      <tr>
                        <th>Address 2:</th>
                        <td>{{ $Company->address2 }}</td>
                      </tr>
                      <tr>
                        <th>City:</th>
                        <td>{{ $Company->city }}</td>
                      </tr>
                      <tr>
                        <th>State:</th>
                        <td>{{ $Company->state }}</td>
                      </tr>
                      <tr>
                        <th>Zip:</th>
                        <td>{{ $Company->zip }}</td>
                      </tr>
                      <tr>
                        <th>Country:</th>
                        <td>{{ $Company->country }}</td>
                      </tr>
                      <tr>
                        <th>SharePoint Folder:</th>
                        <td>{{ $Company->sharepoint }}</td>
                      </tr>
                      <tr>
                        <th>Customer Contract Type:</th>
                        <td>{{ $Company->customer_contract_type }}</td>
                      </tr>
                      <tr>
                        <th>Phone:</th>
                        <td>{{ $Company->company_phone }}</td>
                      </tr>
                      <tr>
                        <th>Fax:</th>
                        <td>{{ $Company->fax }}</td>
                      </tr>
                      <tr>
                        <th>Website:</th>
                        <td>{{ $Company->website }}</td>
                      </tr>
                      <tr>
                        <th>LinkedIn:</th>
                        <td>{{ $Company->linkedin }}</td>
                      </tr>
                      <tr>
                        <th>Facebook:</th>
                        <td>{{ $Company->facebook }}</td>
                      </tr>
                      <tr>
                        <th>Twitter:</th>
                        <td>{{ $Company->twitter }}</td>
                      </tr>  
                    </table>
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Company Details</h3>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th width="20%">Company Id:</th>
                        <td>{{ $Company->company_id }}</td>
                      </tr>
                      <tr>
                        <th>Territory:</th>
                        <td>{{ $Company->territory }}</td>
                      </tr>
                      <tr>
                        <th>Market:</th>
                        <td>{{ $Company->market }}</td>
                      </tr>
                      <tr>
                        <th>Primary Sales Rep:</th>
                        <td>{{ $Company->PrimarySalesPerson->first_name }}</td>
                      </tr>
                      <tr>
                        <th>Secondary Sales Rep:</th>
                        <td>{{ $Company->SecondarySalesPerson->first_name }}</td>
                      </tr>
                      <tr>
                        <th>Not a Fit Reason:</th>
                        <td>
                            @if($Company->not_a_fit_reason == 1)
                                Customer say no
                            @else
                                -
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Customer Billing Contact:</th>
                        <td>{{ $Company->customer_billing_contact }}</td>
                      </tr>
                      <tr>
                        <th>Customer Billing Email:</th>
                        <td>{{ $Company->customer_billing_email }}</td>
                      </tr>
                      <tr>
                        <th>Customer Billing Phone:</th>
                        <td>{{ $Company->customer_billing_phone }}</td>
                      </tr>
                      <tr>
                        <th>Customer Sales Contact:</th>
                        <td>{{ $Company->customer_sales_contact }}</td>
                      </tr>
                      <tr>
                        <th>Customer Sales Email:</th>
                        <td>{{ $Company->customer_sales_email }}</td>
                      </tr>
                      <tr>
                        <th>Customer Sales Phone:</th>
                        <td>{{ $Company->customer_sales_phone }}</td>
                      </tr>
                      <tr>
                        <th>Type:</th>
                        <td>{{ $Company->type }}</td>
                      </tr>
                      <tr>
                        <th>Status:</th>
                        <td>
                            @if($Company->status == 1)
                                Not Approved
                            @elseif($Company->status == 2)
                                Approved
                            @else
                                -
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Account Id:</th>
                        <td>{{ $Company->account_id }}</td>
                      </tr>
                      <tr>
                        <th>Vendor Id:</th>
                        <td>{{ $Company->vendor_id }}</td>
                      </tr>
                      <tr>
                        <th>Date Acquired:</th>
                        <td>{{ $Company->date_acquired }}</td>
                      </tr>
                    </table>
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Primary Contact</h3>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th width="20%">Name:</th>
                        <td>{{ $Company->name }}</td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td>{{ $Company->email }}</td>
                      </tr>
                      <tr>
                        <th>Title:</th>
                        <td>{{ $Company->title }}</td>
                      </tr>  
                      <tr>
                        <th>Relationship:</th>
                        <td>{{ $Company->relationship }}</td>
                      </tr>
                      <tr>
                        <th>Phone:</th>
                        <td>{{ $Company->phone }}</td>
                      </tr>
                      <tr>
                        <th>Type:</th>
                        <td>{{ $Company->primary_type }}</td>
                      </tr>  
                    </table>
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Company Team</h3>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th width="20%">Account Manager:</th>
                        <td>{{ $Company->account_manager }}</td>
                      </tr>
                      <tr>
                        <th>Primary Tech:</th>
                        <td>{{ $Company->primary_tech }}</td>
                      </tr>
                      <tr>
                        <th>Sales Orginator:</th>
                        <td>{{ $Company->sales_orginator }}</td>
                      </tr>  
                    </table>
                    <div style="float: right;">
                        <a href="{{ route('Company.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
                    </div>
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