
@extends('admin.layouts.master')

{{-- @if(Auth::check())
    @if (Auth::user()->usertype=='serviceManager')
    @extends('admin.layouts.smMaster')
    @endif
@endif --}}

@section('title')

service details
    
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <br>
                <div class="">
                <h2 align="center">{{$service->title}}</h2>
                </div>

                <div class="container">

                <a href="/services" class="btn btn-primary">Go Back</a>
                </div>

                <hr>
                
                <div class="card-body">

                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                            <img style="width:100%;height:300px" src="/storage/cover_images/{{$service->cover_image}}">
                                                
                                            <h3>Description:
                                              {{$service->description}}</h3>
                                                
                                            <h4>Uploaded by: {{$service->user->name}}</h4>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                            <b>Available Categories:</b>

                                            @foreach ($service->serviceCategories as $category)
                                            <ul class="list-group">
                                            
                                            <li class= "list-group-item">
                                                {{$category->cat_title}}
                                            </li>
                                        
                                            </ul>
                          
                                            <br>
                                                
                                            @endforeach
                                            <u><a href="/services-categories/create" >+Add new category</a></u>
                                            
                                            </div>

                                    </div>
                                    </div>


                                </div>

                                <a href="/services/{{$service->id}}/edit" class="btn ">Edit</a>

    
                                {!!Form::open(['action'=>['ServicesController@destroy',$service->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            
                            {!!Form::close()!!}
                                </div>
                                </div>

                </div>
            </div>
        </div>
  

{{-- 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3>{{$service->title}}</h3>
                </div>
                <div class="card-body">

    
    <a href="/services" class="btn btn-primary">Go Back</a>
    <br><br>

<img style="width:100%; height:400px" src="/storage/cover_images/{{$service->cover_image}}">

                <small>{{$service->description}}</small>
                <P>Uploaded by user: {{$service->user->name}}</P>

   
    <p>Available Categories:</p>
            <div>
                @foreach ($service->serviceCategories as $category)
                <li class="list-group-item">
                    {{$category->cat_title}}
                </li>
                <br>
                    
                @endforeach
            </div>
<u><a href="/services-categories/create" >+Add new category</a></u>
    {{-- <small>Added on {{$service->created_at}}</small> --}}

{{-- <br>
<br>
    <a href="/services/{{$service->id}}/edit" class="btn ">Edit</a>
    
    {!!Form::open(['action'=>['ServicesController@destroy',$service->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
  </div>
    </div>

</div>

</div>

</div> 
</div>
</div> --}}
@endsection

  @section('scripts')
      
  @endsection



    