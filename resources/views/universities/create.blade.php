@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')

<h1>Add a new university</h1>
<hr>
{!! Form::open(['action' => 'UniversitiesController@store', 'method' => 'POST']) !!}

	<div class="form-group">

		{{Form::label('name', 'Name')}}
	<div class="row">
		<div class="col-2">
		{{Form::text('abrv','', ['class' => 'form-control', 'placeholder' => 'Abbreviation <UTS>'])}}
		</div>
		<div class="col">
		{{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Name'])}}
		</div>
	</div>
		<br>
		@if(env('GOOGLE_RECAPTCHA_KEY'))
     <div class="g-recaptcha"
          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
		@endif
		
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}

@endsection