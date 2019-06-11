@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<h1>Univiersities</h1>
<hr>
@if(count($universities) > 0)
	@foreach($universities as $university)
		<div class="well">
			<ul>
			<li><h3>{{$university->name}}</a></h3></li>
			<small>{{$university->abrv}}</small>
		</ul>
			
		</div>
	@endforeach
@else
	<p style="text-align: center;">No universities found</p>
@endif
<br>
<hr>
<a href="/university/create" class="btn btn-primary">Add a univeristy</a>
@endsection