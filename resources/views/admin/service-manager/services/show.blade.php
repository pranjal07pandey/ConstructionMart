
@extends('admin.layouts.smMaster')

@section('title')

Show Services
    
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3>{{$service->title}}</h3>
                </div>
                <div class="card-body">

    
    <a href="/service-manager-index" class="btn btn-primary">Go Back</a>
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

<br>
<br>
        <a href="/service-manager-edit/{{$service->id}}" class="btn ">Edit</a>


    <form method="POST" class="pull-right" action="/service-delete/{{$service->id}}" onsubmit ="return confirm('are you sure ?')">
        @csrf
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
    
  </div>
    </div>

</div>

</div>

</div>
</div>
</div>
@endsection

  @section('scripts')
      
  @endsection



    