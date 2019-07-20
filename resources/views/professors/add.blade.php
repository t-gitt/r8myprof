<title>{{ config('app.name', 'Laravel') . ' | ' . 'Add a professor' }}</title>
@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')

@section('content')

<h1>Add a new professor</h1>
<hr>
<div style="container">
{!! Form::open(['action' => 'ProfessorsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

	<div class="form-group">

	<div class="row">
		<div class="col-12 col-lg-4">
			<br>
		{{Form::label('titles', 'Titles*')}}
		{{Form::text('titles','', ['class' => 'form-control', 'placeholder' => '<Mr. Ms. Mrs. Dr. Prof.>'])}}
		</div>
		<div class="col-12 col-lg-4">
			<br>
		{{Form::label('f_name', 'First Name*')}}
		{{Form::text('f_name','', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
		</div>
		<div class="col-12 col-lg-4">
			<br>
		{{Form::label('l_name', 'Last Name*')}}
		{{Form::text('l_name','', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
		</div>
	</div>
		<br>

		<div class="row">
			<div class="col-12">
				{{Form::label('faculty', 'Faculty*')}}
				{{Form::text('faculty','', ['class' => 'form-control', 'placeholder' => 'Faculty'])}}
			</div>
		</div>
		

		<br>
		{{Form::label('university', 'University*')}}
		<div class="row">
			<div class="col-12 col-lg-4">
		 <select name="university"class="form-control">
		 	<option value="">Select a university</option>
		@foreach($universities as $university)
	      <option value="{{$university->id}}">{{$university->abrv}} - {{$university->name}}  </option>
		@endforeach
	    </select>	
			</div>
			<div class="col-12 col-lg-4">
				<p style="margin-top: 8px;">Is your university not on the list?</p>
			</div>
			<div class="col-12 col-lg-4">
			<!-- Button to Open the Modal -->
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
			  Add a new university!
			</button>
			</div>
		</div>
<br>


		{{Form::label('url', 'URL')}}
		{{Form::text('url','', ['class' => 'form-control', 'placeholder' => 'URL (optional)'])}}

<br>
	<div class="row">
		<div class="col-2">
			{{Form::label('prof_pic', 'Prof\'s Picture')}}
			{{Form::file('prof_pic')}}
		</div>
	</div>

	</div>

	@csrf
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}
</div>
@endsection
				@include('universities.modal.create')