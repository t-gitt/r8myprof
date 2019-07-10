@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')

{!! Form::open(['action' => 'RatingsController@store', 'method' => 'POST']) !!}

	<div class="form-group">

<div class="container" id="courseRating">
	
<h2>Course</h2>
<hr>
	<div class="row">
		<div class="col">
		{{Form::label('course_rating', 'Course Rating')}}
		<div class="col-12">
			
		<small style="color:grey;">How would you rate this course in general?</small>
			@include('inc.courseStars')
		</div>
		</div>
	</div>
	<br>

	<div class="row">
<div class="col">
		{{Form::label('course', 'Course Name')}}
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
</div>
	</div>
</div>

	<br>

<div class="container" id="professorRating">
<h2>Professor</h2>
<hr>

	<div class="row">
		<div class="col-sm-12">
			<strong>
				{{Form::label('pcharacter_rating', 'Professor\'s Character')}}
			</strong>

		<div class="col-sm-12">
			<small style="grey">Professional interactions with students within and byond the classroam. Along with creating a supportive environement for the students.</small>
		@include('inc.pcharacterStars')
		</div>
		</div>
		<div class="col-sm-12">
			<strong>
				{{Form::label('pteaching_rating', 'Professor\'s Teaching skills')}}
			</strong>
		<div class="col-sm-12">
			<small style="grey">Uses modern and creative teaching methods to further explain the subject's ideas and concepts.</small>
			@include('inc.pteachingStars')
		</div>
		</div>
		<div class="col-sm-12">
			<strong>
				{{Form::label('pmastery_rating', 'Professor\'s Mastery of the course ')}}
			</strong>
		<div class="col-sm-12">
			<small style="grey">Knowledge and enthusiasm for the subject matter.</small>
			@include('inc.pmasteryStars')
		</div>
		</div>
	</div>
	<br>
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
