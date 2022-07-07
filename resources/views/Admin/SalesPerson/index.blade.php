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
                                <td style="display: flex;padding-right: 0;padding-left: 0">
                                    <a href="{{ route('SalesPerson.edit', $row['id']) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg> -->
                                    </a>
                                    <!-- <a href="{{ route('SalesPerson.destroy', $row['id']) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this sales person record?')">Delete</a> -->
                                    &nbsp
                                    <form action="{{route('SalesPerson.destroy', $row->id)}}" method="POST" class="float-left ml-2">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure you want to delete this sales person record ?')">
                                                <i class="fa fa-trash-o"></i>
                                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                </svg> -->
                                            </button>
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
