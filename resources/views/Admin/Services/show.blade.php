@extends('layouts.app', ['title' => __('Services')])

@section('content')
    @include('layouts.headers.list-cards')   
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Services</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th width="20%">Service Category:</th>
                        <td>{{ $Services->ServicesCategory->name }}</td>
                      </tr>
                      <tr>
                        <th>Service Sub Category:</th>
                        <td>{{ $Services->ServicesSubCategory->name }}</td>
                      </tr>
                      <tr>
                        <th>Service Name:</th>
                        <td>{{ $Services->name }}</td>
                      </tr>
                      <tr>
                        <th>Payment Terms:</th>
                        <td>{{ $Services->PaymentTerms->name }}</td>
                      </tr>
                      <tr>
                        <th>Estimated Cost:</th>
                        <td>
                            @if(!empty($Services->estimated_cost))
                                {{ $Services->estimated_cost }}
                            @else
                                -
                            @endif
                        </td>
                      </tr>
                      <tr>
                        <th>Block Of Hours:</th>
                        <td>
                            @if(!empty($Services->block_of_hours))
                                {{ $Services->block_of_hours }}
                            @else
                                -
                            @endif
                        </td>
                      </tr>
                    </table>
                    <div style="float: right;">
                        <a href="{{ route('Services.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
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