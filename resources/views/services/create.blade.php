<!DOCTYPE html>
<html>
<body>

<h2>Create Service</h2>


<div class="container">
<div class="jumbotron">
{!! Form::open(['action' => 'ServicesController@store','method'=>'POST','enctype'=> 'multipart/form-data']) !!}

<div class="form-group">
  {{form::label('title', 'Title')}}
  {{form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
</div>
  {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

</div>
</div>



</body>
</html>
