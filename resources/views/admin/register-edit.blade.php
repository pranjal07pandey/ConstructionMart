@extends('admin.layouts.master')

@section('title')

Edit User Role
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit User Role</h3>
                </div>
                <div class="card-body">

                    <form action="/role-update/{{$users->id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                        <input type="text" class="form-control" value="{{$users->name}}" name="name">
                          </div>

                          <div class="form-group">
                            <label>Registered As</label>
                        <option type="text" class="form-control" value="registered_as">{{$users->registered_as}}</option>
                          </div>

                          <div class="form-group">
                            <label>Give Role</label>
                            <select name="usertype"  class="form-control">
                                <option value="">None</option>
                                <option value="serviceManager">Vendor</option>
                                <option value="user">user</option>
                                <option value="admin">Admin</option>
                            </select>
                          </div>

                          <button type="submit" class="btn btn-success">update</button>
                          <a href="/role-register" class="btn btn-danger">cancel</a>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection


@section('scripts')


@endsection
