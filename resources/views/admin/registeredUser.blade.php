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
              <th>
                {{-- <a href="user-profile/{{$users->id}}"> --}}
                  Name
                
              </th>
              
                <th>Phone</th>
                <th>Email</th>
                <th>Registered As</th>
                <th>User Type</th>
                <th>Edit</th>
                <th>Delete</th>
                {{-- <th>Action</th> --}}

              </thead>

              <tbody>
                  @foreach ($users as $row)
                      
                  

                <tr>
                    <td><a href="user-profile/{{$row->id}}">{{$row->name}}</a> </td>
                    <td>{{$row->phone}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->registered_as}}</td>
                    <td>{{$row->usertype}}</td>  
                
                    <td>
                    <a href="/role-edit/{{$row->id}}" class="btn btn-priamry">Give Role</a>
                    </td>

                    <td>
                        <form method="POST" action="/role-delete/{{$row->id}}" onsubmit ="return confirm('are you sure ?')">
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>

                    </td>

                    {{-- <td>
                    <a href="/user-viewProfile/{{$row->id}}" class="btn btn-primary">View Profile</a>

                    </td> --}}


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
