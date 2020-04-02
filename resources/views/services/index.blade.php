
<h1 align="center">Services</h1>

<a href="/services/create">Add new Service</a>



@if(count($services)>0)

@foreach ($services as $service)
<div class="container">
    <div class="jumbotron">
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <h3><a href="/services/{{$service->id}}">{{$service->title}}</a></h3>
                </a>
            </div>

            <p>Available Categories:</p>
            <div>
                @foreach ($service->serviceCategories as $category)
                <li>
                    {{$category->cat_title}}
                </li>
                    
                @endforeach
            </div>
        
        <div class="col-md-8 col-sm-8">
            <small>Added on {{$service->created_at}}</small>
            </div>
    </div>
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