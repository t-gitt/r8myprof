@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')

<h1>Add a new professor</h1>
<hr>
{!! Form::open(['action' => 'RatingsController@store', 'method' => 'POST']) !!}

	<div class="form-group">

	<div class="row">
		<div class="col">
		{{Form::label('rating', 'Rating')}}
		<input type="number" name="rating" max="5" min="1" placeholder="0"> <strong style="color:green;">out of 5.0</strong>
		</div>
	</div>
		<br>
		{{Form::label('course', 'Course')}}
	<div class="row">
			<div class="col">
				@if(count($courses) > 0)
		 <select name="course_id"class="form-control">
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
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal">
			  Add a new course!
			</button>
			</div>
	</div>
<br>
		
		{{Form::label('comment', 'Comment')}}
		{{Form::textarea('comment','', ['class' => 'form-control', 'placeholder' => 'Comment'])}}


	</div>
	{{Form::hidden('student_id', $student_id) }}
	{{Form::hidden('prof_id', $prof_id)}}

	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}

				@include('courses.modal.create')

@endsection
