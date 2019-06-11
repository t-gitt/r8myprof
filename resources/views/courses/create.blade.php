@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')

<h1>Add a new course</h1>
<hr>
{!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}

	<div class="form-group">

		{{Form::label('courseInfo', 'Course Info')}}

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
				@include('universities.modal.create')
			</div>
		</div>
<br>
	<div class="row">
		<div class="col-2">
		{{Form::text('code','', ['class' => 'form-control', 'placeholder' => 'Course Code'])}}
		</div>
		<div class="col">
		{{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
		</div>

	</div>
		<br>
		@if(env('GOOGLE_RECAPTCHA_KEY'))
     <div class="g-recaptcha"
          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
		@endif
		<br>
		
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}

@endsection