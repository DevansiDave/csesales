@extends('layouts.app', ['title' => __('Payment Terms')])

@section('content') 
@include('layouts.headers.list-cards')
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit Payment Terms</h3>
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
                    <form action="{{ route('PaymentTerms.update',$PaymentTerms->id) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="payment_terms">Payment Terms*</label>
                            <input type="text" id="payment_terms" name="payment_terms" class="form-control" value="{{old('payment_terms') ?? $PaymentTerms->name}}">
                        </div>
                        <div style="display: flex;justify-content: flex-end;">
                            <input class="btn btn-success upload-result" type="submit" value="UPDATE" style="margin-top: 22px">
                            <a href="{{ route('PaymentTerms.index') }}"><input class="btn btn-success" type="button" value="BACK" style="margin-top: 22px"></a>
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
