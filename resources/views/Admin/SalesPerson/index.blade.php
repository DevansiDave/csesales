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
                            <h3 class="mb-0">Sales Person</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('SalesPerson.create') }}" class="btn btn-sm btn-primary">Add Sales Person</a>
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
                                <th scope="col">Fist Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Secondary Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Region</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @if($salesperson->count() > 0)
                            @foreach($salesperson as $key => $row)
                            <tr>
                                <td>{{ $salesperson->firstItem() + $key }}</td>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->second_email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>
                                    @if($row->region == 1)
                                    US
                                    @elseif($row->region == 2)
                                    India
                                    @elseif($row->region == 3)
                                    Philippines
                                    @elseif($row->region == 4)
                                    Equador
                                    @endif
                                </td>
                                <td style="display: flex;">
                                    <a href="{{ route('SalesPerson.edit', $row['id']) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <!-- <a href="{{ route('SalesPerson.destroy', $row['id']) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this sales person record?')">Delete</a> -->
                                    &nbsp
                                    <form action="{{route('SalesPerson.destroy', $row->id)}}" method="POST" class="float-left ml-2">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                title="delete"
                                                onclick="return confirm(\'Are you sure you want to delete this sales person record ?\')">Delete</button>
                                    </form>
                                  </td>
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td align="center" colspan="6">No Sales Person Record Available</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-left" style="float: right;padding-right: 45px;">
                    {{ $salesperson->links('pagination::bootstrap-4') }}
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
