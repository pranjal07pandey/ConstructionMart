@extends('admin.layouts.master')

@section('title')

Newsletter
    
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Newsletter Subscribers</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Email
                          
                        </th>
                        
                          <th>Subscribed Date</th>
                          
          
                        </thead>

                        <tbody>

                            @foreach ($news as $newsletter)

                        <tr>
                            
                            <td>{{$newsletter->email}}</td>
                        
                        <td>
                            {{$newsletter->created_at}}
                        </td>
                        </tr>

                            @endforeach
                        </tbody>
          
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    
@endsection