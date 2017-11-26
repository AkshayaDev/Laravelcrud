@extends('master')

@section('content')
<div class="container">
  <h2>Insert User</h2>
	@if (session('status'))
	<div class="alert alert-success">
	    {{ session('status') }}
	</div>
	@endif
  {{ Form::open(array('url' => '/insert')) }}
    <div class="form-group">
      <label for="name">Name:</label>
      {{ Form::text('name',old('name'),array('class'=>'form-control','placeholder'=>'Enter name')) }}
          @if ($errors->has('name'))
            <p style="color: #ff0000;">{{ $errors->first('name') }}</p>
          @endif
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      {{ Form::email('email',old('email'),array('class'=>'form-control','placeholder'=>'Email')) }}
          @if ($errors->has('email'))
            <p style="color: #ff0000;">{{ $errors->first('email') }}</p>
          @endif
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      {{ Form::password('password',array('class'=>'form-control','placeholder'=>'Enter password')) }}
      @if ($errors->has('password'))
        <p style="color: #ff0000;">{{ $errors->first('password') }}</p>
      @endif
    </div>
    <button type="submit" class="btn btn-default">Insert</button>
  {{ Form::close() }}
  <a href="{{ route('listusers') }}" class="btn btn-default">List Users</a>
</div>
@stop