@extends('admin.layouts.smMaster')

@section('title')

Dashboard
 
@endsection


@section('content')

<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Welcome to Vendor Dashboard</h4>
      </div>
      <div class="card-body">
        
        <h5>You can add your own products and services here</h5>
        

        
      </div>
    </div>
  </div>
</div>

  
@endsection

@section('scripts')
    
@endsection
