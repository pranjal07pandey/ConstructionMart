

{{-- @if(Auth::check())
    @if (Auth::user()->usertype =='serviceManager')
    @extends('admin.layouts.smMaster')
    @endif


@endif --}}

@extends('admin.layouts.master')




@section('title')

Dashboard
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Our Services</h3>
                        <a href="/services/create" class="btn btn-primary ">Add new Service</a>

                </div>
                <br>

                    <div class="card-body">

                    
                                @if(count($services)>0)

                                @foreach ($services as $service)
                                <div class="container">
                                    
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                            <h3><a href="/services/{{$service->id}}">
                                            
			                                    {{-- <img src="{{ URL::asset('/storage/app/public/cover_images'.$service->cover_image) }}" alt="IMG-PRODUCT" style="width:100%;height:300px"> --}}

                                                <img style="width:100%;height:200px" src="{{ URL::asset('uploads/services/'.$service->cover_image)}}">

                                            {{-- <small>{{$service->description}}</small> --}}

                                            
                                            </a>{{$service->title}}</h3>
                                                </a>
                                            <p>Uploaded By: {{$service->user->name}}</p>
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
                                        
                                        {{-- <div class="col-md-8 col-sm-8">
                                            <small>Added on {{$service->created_at}}</small>
                                            </div> --}}
                                    </div>
                                    </div>


                                </div>
                                {{-- {{$service->title}} --}}
                                <br>
                                <hr>
                                @endforeach

                                {{$services->links()}}

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


{{-- <div class="container">
    <h1 align="center"> Our Services</h1>
</div>

<div class="container">
<a href="/services/create" class="btn btn-primary">Add new Service</a>
<a href="/dashboard" class="pull-right btn btn-primary">Return to Dashboard</a>

</div>

<br> --}}





@endsection

@section('scripts')
    
@endsection

{{-- @include('include.footer')
@include('include.js')


    

</body>
</html> --}}

