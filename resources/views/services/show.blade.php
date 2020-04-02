<div class="container">
    <div class="jumbotron">
    
    <a href="/services" class="btn btn-primary">Go Back</a>
    <br><br>
    <h1>
        {{$service->title}}
    </h1>
    <p>Available Categories:</p>
            <div>
                @foreach ($service->serviceCategories as $category)
                <li>
                    {{$category->cat_title}}
                </li>
                    
                @endforeach
            </div>
<a href="/services-categories/create">Add new category</a>
    {{-- <small>Added on {{$service->created_at}}</small> --}}

<br>
    <a href="/services/{{$service->id}}/edit" class="btn btn-primary">Edit</a>
    
    {!!Form::open(['action'=>['ServicesController@destroy',$service->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
    </div>
    </div>
    