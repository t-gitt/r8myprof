@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<h1>Courses</h1>
<hr>
@if(count($courses) > 0)
	@foreach($courses as $course)
		<div class="well">
			<ul>
			<li>
				<div class="">
					<h3> {{$course->name}} |</h3> <h3 style="color:darkorange">{{' ' . $course->code}}</h3>
				</div>
			</li>
			<p>{{$course->university['name'] . ' - ' . $course->university['abrv']}}</p>
		</ul>
			
		</div>
		<hr>
	@endforeach
@else
	<p style="text-align: center;">No courses found</p>
@endif
<br>
<a href="/courses/create" class="btn btn-primary">Add a course</a>
@endsection