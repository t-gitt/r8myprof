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
		{{Form::text('titles','', ['class' => 'form-control', 'placeholder' => 'Titles <Dr. Prof.>'])}}
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
		{{Form::label('course', 'Course')}}
	<div class="row">
			<div class="col">
				@if(count($courses) > 0)
		 <select name="course"class="form-control">
		 	<option value="">Select a course</option>
@foreach($courses as $course)
	      <option value="{{$course->id}}">{{$course->name}}  -  {{$course->code}}</option>
		@endforeach
	    </select>	
	    @else
	    	<p>no courses are found</p>
	    @endif
			</div>
			<div class="col">
			<!-- Button to Open the Modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			  Add a new course!
			</button>
				@include('courses.modal.create')
			</div>
	</div>
<br>
		
		{{Form::label('comment', 'Comment')}}
		{{Form::textarea('comment','', ['class' => 'form-control', 'placeholder' => 'Comment'])}}


	</div>
	{{Form::hidden('student_id', $student_id) }}
	{{Form::hidden('prof_id', $prof_id)}}

		@if(env('GOOGLE_RECAPTCHA_KEY'))
     <div class="g-recaptcha"
          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
		@endif
		<br>
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}

@endsection
