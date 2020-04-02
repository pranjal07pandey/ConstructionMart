<div class="container">
    <div class="jumbotron">
    
    <a href="/services-categories" class="btn btn-primary">Go Back</a>
    <br><br>
    <div>
        {{$category->cat_title}}
    </div>
    <small>Added on: {{$category->created_at}}</small>
    <small>Belongs to : {{$category->service->title}} </small>
<br>
    <a href="/services-categories/{{$category->id}}/edit" class="btn btn-primary">Edit</a>
    
    {!!Form::open(['action'=>['ServiceCategoryController@destroy',$category->id], 'method'=>'POST','class'=>'pull-right'])!!}
    
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    
    {!!Form::close()!!}
    
    </div>
    </div>
    