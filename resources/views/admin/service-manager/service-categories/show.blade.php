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
                <h3>{{$category->cat_title}}</h3>
                </div>
                <div class="card-body">

    
    <a href="/service-cat-manager-index" class="btn btn-primary">Go Back</a>
    <br><br>

<img style="width:100%; height:400px" src="/storage/cover_images/{{$category->cover_image}}">

   

    <h5>Added on: {{$category->created_at}}</h5><br>
    <h5>Descrption: {{$category->description}}</h5><br>

    <h4>Belongs to : {{$category->service->title}} </h4>
<br>
                <a href="/service-cat-edit/{{$category->id}}" class="btn">Edit</a>
    
                <form method="POST" class="pull-right" action="/service-cat-delete/{{$category->id}}" onsubmit ="return confirm('are you sure ?')">
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
    
</div>

</div>

</div>
</div>
</div>


@endsection

@section('scripts')
    
@endsection