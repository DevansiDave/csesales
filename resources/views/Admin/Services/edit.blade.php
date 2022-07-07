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
                            <h3 class="mb-0">Edit Services</h3>
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
                    <form action="{{ route('Services.update',$Services->id) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="service_category">Services Category*</label>
                            <select class="custom-select form-control-border border-width-2" style="width: 100%" id="service_category" name="service_category" value="{{old('service_category')}}">
                                <option disabled selected>Select any one</option>
                                @foreach ($ServicesCategory as $row)
                                    @if($Services)
                                        <option value="{{ $row->id }}" {{ ($Services->services_category_id == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_sub_category">Services Sub Category*</label>
                            <select class="custom-select form-control-border border-width-2" style="width: 100%" id="service_sub_category" name="service_sub_category" value="{{old('service_sub_category')}}">
                                <option disabled selected>Select any one</option>
                                @if($Services->services_sub_category_id)
                                    @foreach($ServicesSubCategory as $row)
                                        <option value="{{ $row->id }}" {{ ($Services->services_sub_category_id == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                    @endforeach
                                @else

                                @endif
                                <!-- @foreach ($ServicesSubCategory as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Services Name*</label>
                            <input type="text" id="service_name" name="service_name" class="form-control" value="{{old('service_name') ?? $Services->name}}" placeholder="Enter services name">
                        </div>
                        <div class="form-group">
                            <label for="payment_term">Payment Terms*</label>
                            <select class="custom-select form-control-border border-width-2" style="width: 100%" id="payment_term" name="payment_term" value="{{old('payment_term')}}">
                                <option disabled selected>Select any one</option>
                                @foreach ($PaymentTerms as $row)
                                    @if(!empty($Services->payment_term_id))
                                        <option value="{{ $row->id }}" {{ ($Services->payment_term_id == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                    @else
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estimated_cost">Estimated Cost*</label>
                            <input type="number" id="estimated_cost" name="estimated_cost" class="form-control" value="{{old('estimated_cost') ?? $Services->estimated_cost}}" placeholder="Enter estimated cost">
                        </div>
                        <div class="form-group">
                            <label for="block_of_hours">Block Of Hours*</label>
                            <input type="number" id="block_of_hours" name="block_of_hours" class="form-control" value="{{old('block_of_hours') ?? $Services->block_of_hours}}" placeholder="Enter block of hours">
                        </div>
                        <div style="display: flex;justify-content: flex-end;">
                            <input class="btn btn-success upload-result" type="submit" value="UPDATE" style="margin-top: 22px">
                            <a href="{{ route('Services.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
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
@push('page_scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            //sub category dropdown dynamic data
                $('select[name="service_category"]').on('change', function () {
                    var service_category = $(this).val();
                    if (service_category) {
                        $.ajax({
                            url: '/subcategory/ajax/' + service_category,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="service_sub_category"]').empty();
                                $('select[name="service_sub_category"]').append('<option disabled selected>Select any one</option>');
                                $.each(data, function (key, value) {
                                    $('select[name="service_sub_category"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="service_sub_category"]').empty();
                    }
                });
        });
    </script>
@endpush
