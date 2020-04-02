
<h1 align="center">Service Categories</h1>

<a href="/services-categories/create">Add new Category</a>


@if(count($category)>0)

@foreach ($category as $service)
<div class="container">
    <div class="jumbotron">
    <div class="well">
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <h3><a href="/services-categories/{{$service->id}}">{{$service->cat_title}}</a></h3>
                </a>
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

{{$category->links()}}

@else
<p>No category found</p>
    


</div>
</div>
@endif