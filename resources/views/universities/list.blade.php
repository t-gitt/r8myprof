@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<h1>Universities</h1>
<hr>
@if(count($universities) > 0)
	@foreach($universities as $university)
		<div class="container" style="text-align: center;">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="well">
						<a style="color:#181818;"href="/university/{{$university->id}}"><img class="pic"src="/storage/uni_logos/{{$university->uni_logo}}" alt="University logo"></a>
					</div>
					<br>
					<ul>
						<li><a style="color:#181818;"href="/university/{{$university->id}}"><h3>{{$university->name}}</h3></a></li>
						<small><a href="/university/{{$university->id}}">{{$university->abrv}}</a></small>
					</ul>
					<hr>
				</div>
			</div>
		</div>
	@endforeach
@else
	<p style="text-align: center;">No universities found</p>
@endif
<br>
<div style="text-align: center">
<a href="/university/create" class="btn btn-primary">Add a univeristy</a>
</div>
@endsection