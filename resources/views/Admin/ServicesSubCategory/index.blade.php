@extends('layouts.app', ['title' => __('Services Sub Category')])

@section('content')
    @include('layouts.headers.list-cards')
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Services Sub Category</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('ServicesSubCategory.create') }}" class="btn btn-sm btn-primary">Add Services Sub Category</a>
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
                @if(\Session::has('success'))
                    <div class="alert alert-success" id="alertMessage">
                      <p>{{\Session::get('success')}}</p>
                    </div>
                @endif
                @if(\Session::has('Delete'))
                    <div class="alert alert-danger" id="alertMessage">
                      <p>{{\Session::get('Delete')}}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Service Category Name</th>
                                <th scope="col">Service Sub Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @if($ServicesSubCategory->count() > 0)
                            @foreach($ServicesSubCategory as $key => $row)
                            <tr>
                                <td>{{ $ServicesSubCategory->firstItem() + $key }}</td>
                                <td>{{ $row->ServicesCategory->name }}</td>
                                <td>{{ $row->name }}</td>
                                <td style="display: flex;padding-right: 0;padding-left: 0">
                                    <a href="{{ route('ServicesSubCategory.edit', $row['id']) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    &nbsp
                                    <form action="{{route('ServicesSubCategory.destroy', $row->id)}}" method="POST" class="float-left ml-2">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this services sub category record ?')">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td align="center" colspan="6">No Services Sub Category Record Available</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-left" style="float: right;padding-right: 45px;">
                    {{ $ServicesSubCategory->links('pagination::bootstrap-4') }}
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
