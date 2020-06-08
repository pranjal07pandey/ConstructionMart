@extends('admin.layouts.smMaster')
  

@section('title')

Service Categories
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Service Categories</h3>
                        <a href="/service-cat-manager-create" class="btn btn-primary ">Add new Category</a>

                </div>
                <br>

                    <div class="card-body">

                        {{-- @if(count($category)>0) --}}

                            @foreach ($category as $service)
                            <div class="container">
                                {{-- <div class="jumbotron"> --}}
                                <div class="well">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                        <h3><a href="/show-service-cat/{{$service->id}}">{{$service->cat_title}}</a></h3>
                                            
                                        </div>
                                    
                                    <div class="col-md-8 col-sm-8">
                                      <p style="font-size: 20px">Belongs to: {{$service->service->title}} </p>
                                        <small>Added on:  {{$service->created_at}}</small>
                                        <br>
                                        
                                        </div>
                                </div>
                                </div>

                          
                            </div>
                            <hr>
                            @endforeach

                            {{-- {{$category->links()}} --}}

                            {{-- @else
                            <p>No category found</p>

                            @endif --}}


                    </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('scripts')
    
@endsection