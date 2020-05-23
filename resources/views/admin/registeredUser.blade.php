@extends('admin.layouts.master')

@section('title')

Registered roles
    
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Registered Users</h4>
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Registered As</th>
                <th>User Type</th>
                <th>Edit</th>
                <th>Delete</th>

              </thead>

              <tbody>
                  @foreach ($users as $row)
                      
                  

                <tr>
                    <td>{{$row->name}} </td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->registered_as}}</td>
                    <td>{{$row->usertype}}</td>  
                
                    <td>
                    <a href="/role-edit/{{$row->id}}" class="btn btn-priamry">EDIT</a>
                    </td>

                    <td>
                        <form method="POST" action="/role-delete/{{$row->id}}" onsubmit ="return confirm('are you sure ?')">
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>

                    </td>

                </tr>

                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection

@section('scripts')
    
@endsection
