@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')

@section('content')

<h1>Add a new professor</h1>
<hr>
{!! Form::open(['action' => 'ProfessorsController@store', 'method' => 'POST']) !!}

	<div class="form-group">

	<div class="row">
		<div class="col-2">
		{{Form::label('titles', 'Titles')}}
		{{Form::text('titles','', ['class' => 'form-control', 'placeholder' => '<Mr. Ms. Mrs. Dr. Prof.>'])}}
		</div>
		<div class="col">
		{{Form::label('f_name', 'First Name')}}
		{{Form::text('f_name','', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
		</div>
		<div class="col">
		{{Form::label('l_name', 'Last Name')}}
		{{Form::text('l_name','', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
		</div>
	</div>
		<br>
		
		{{Form::label('university', 'University')}}
		<div class="row">
			<div class="col">
		 <select name="university"class="form-control">
		 	<option value="">Select a university</option>
@foreach($universities as $university)
	      <option value="{{$university->id}}">{{$university->abrv}} - {{$university->name}}  </option>
		@endforeach
	    </select>	
			</div>
			<div class="col-3">
				<p>Your university is not on the list?</p>
			</div>
			<div class="col">
			<!-- Button to Open the Modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			  Add a new university!
			</button>
			</div>
		</div>
<br>


		{{Form::label('url', 'URL')}}
		{{Form::text('url','', ['class' => 'form-control', 'placeholder' => 'URL'])}}

	</div>

		@if(env('GOOGLE_RECAPTCHA_KEY'))
     <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
		@endif
		<br>
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}
@endsection
				@include('universities.modal.create')