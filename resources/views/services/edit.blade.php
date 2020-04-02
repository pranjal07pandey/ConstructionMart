<!DOCTYPE html>
<html>
<body>

<h2>Edit Service</h2>


<div class="container">
<div class="jumbotron">
{!! Form::open(['action' => ['ServicesController@update',$service->id],'method'=>'POST','enctype'=> 'multipart/form-data']) !!}

<div class="form-group">
  {{form::label('title', 'Title')}}
  {{form::text('title',$service->title,['class'=>'form-control','placeholder'=>'Title'])}}
</div>

    {{form::hidden('_method', 'PUT')}}
    {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

</div>
</div>



</body>
</html>
