
@extends('admin.layouts.smMaster')
  

@section('title')

our services
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Our Services</h3>
                        <a href="/service-manager-create" class="btn btn-primary ">Add new Service</a>

                </div>
                <br>

                    <div class="card-body">

                    
                                @if(count($services)>0)

                                @foreach ($services as $service)
                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <h3><a href="/show-service/{{$service->id}}">{{$service->title}}
                                            
			                                

                                                <img style="width:100%;height:200px" src="/storage/cover_images/{{$service->cover_image}}">

                                           

                                            
                                            </a></h3>
                                                </a>

                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                            <b>Available Categories:</b>

                                                @foreach ($service->serviceCategories as $category)
                                                <ul class="list-group">
                                                    <a href="/services-categories/{{$category->id}}" >
                                                <li class= "list-group-item">
                                                    {{$category->cat_title}}
                                                </li>
                                            </a>
                                                </ul>

                                                <br>
                                                    
                                                @endforeach
                                            </div>
                                        
                                      
                                    </div>
                                    </div>


                                </div>
                                <br>
                                <hr>
                                @endforeach

                                {{-- {{$services->links()}} --}}

                                @else
                                <p>No services found</p>
                                    

                                </div>
                                </div>
                                @endif

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    
@endsection

