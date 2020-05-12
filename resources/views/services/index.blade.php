<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('include.css')

</head>
<body>
       <!-- wpf loader Two -->
       <div id="wpf-loader-two">          
        <div class="wpf-loader-two-inner">
          <span>Loading</span>
        </div>
      </div> 
      <!-- / wpf loader Two -->       
    <!-- SCROLL TOP BUTTON -->
      <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

  @include('include.header')

<div class="container">
    <h1 align="center"> Our Services</h1>
</div>

<div class="container">
<a href="/services/create" class="btn btn-primary">Add new Service</a>

</div>

<br>




@if(count($services)>0)

@foreach ($services as $service)
<div class="container">
    
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <h3><a href="/services/{{$service->id}}">{{$service->title}}</a></h3>
                </a>
            </div>

            <div class="col-md-4 col-sm-4">
            <b>Available Categories:</b>

                @foreach ($service->serviceCategories as $category)
                <ul class="list-group">
                    <a href="/services-categories/{{$service->id}}" >
                <li class= "list-group-item">
                    {{$category->cat_title}}
                </li>
            </a>
                </ul>
                    
                @endforeach
            </div>
        
        {{-- <div class="col-md-8 col-sm-8">
            <small>Added on {{$service->created_at}}</small>
            </div> --}}
    </div>
    </div>


</div>
{{-- {{$service->title}} --}}
@endforeach

{{$services->links()}}

@else
<p>No services found</p>
    

</div>
</div>
@endif


@include('include.footer')
@include('include.js')


    

</body>
</html>

