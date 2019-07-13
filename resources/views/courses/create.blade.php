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
		 <select name="university_id"class="form-control">
		 	<option value="">Select a university</option>
@foreach($universities as $university)
	      <option value="{{$university->id}}">{{$university->abrv}} - {{$university->name}}  </option>
		@endforeach
	    </select>	
			</div>
			<div class="col-3">
				<p>Is your university not on the list?</p>
			</div>
			<div class="col">
			<!-- Button to Open the Modal -->
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
			  Add a new university!
			</button>
				@include('universities.modal.create')
			</div>
		</div>
<br>
	<div class="row">
		<div class="col-12 col-lg-4">
			<br>
		{{Form::label('code', 'Course Code*')}}
		{{Form::text('code','', ['class' => 'form-control', 'placeholder' => 'Course Code'])}}
		</div>
		<div class="col-12 col-lg-4">
			<br>
		{{Form::label('name', 'Course Name*')}}
		{{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
		</div>

	</div>
		<br>
		
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}
</div>

@endsection