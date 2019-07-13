@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
@if(count($ratings) > 0)
	<br>
<h2>Ratings</h2>
	<br>
	<br>
	<br>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Professor</th>
				<th>Score</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			
		</thead>
		<thead>
			<?php
			$i=1;
			?>
			@foreach($ratings as $rating)
				<tr>
					<td>{{$i}}</td>
					<td><a href="/professors/{{$rating->professors['id']}}">{{$rating->professors['titles'] . ' ' . $rating->professors['f_name'] . ' ' . $rating->professors['l_name']}}</a></td>
					<td>			<p style="margin-bottom:-10px;color:#181818;">


		<?php
	$pcharacterW = $rating->pcharacter_rating * 0.35;
	$pteachingW = $rating->pteaching_rating * 0.4;
	$pmasteryW = $rating->pmastery_rating * 0.25;
	$starNumber = $pcharacterW + $pteachingW + $pmasteryW;

	if ($starNumber < 2.4) {
	echo "<span style='color:#CB2F2A;'>";
	}elseif ($starNumber > 2.4 && $starNumber < 3.5) {
	echo "<span style='color:darkorange;'>";
	}elseif ($starNumber > 3.5) {
	echo "<span style='color:green;'>";
	}

	?>
	{{'  ' . $starNumber . ' / 5'}}
	</span>
			</p></td>
			<td>{{$rating->created_at}}</td>
			<td>
				<div class="row">
						<a href="/ratings/{{$rating->id}}/edit" class="btn btn-outline-primary">Edit</a>
					</div>
					<br>
				<div class="row">
						{!! Form::open(['action' => ['RatingsController@destroy', $rating->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
						{{Form::hidden('_method', 'DELETE')}}
						{{Form::submit('Delete', ['class'=>'pull-right btn btn-outline-danger'])}}
						{!! Form::close() !!}
				</div>
			</td>
				</tr>
				<?php $i++; ?>
			@endforeach
			
		</thead>
	</table>
@else
<div class="container" style="height: 100%">
<h4 style="text-align: center;">You haven't rated anyone yet :(</h4>
</div>
<br>
<br>
@endif
@endsection