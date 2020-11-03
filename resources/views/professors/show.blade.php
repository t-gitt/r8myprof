
    <title>{{ config('app.name', 'Laravel') . ' | ' . $professor->titles . ' ' . $professor->f_name . ' ' . $professor->l_name }}</title>
@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<div class="container">
	<div class="row">
			<div class="col-md-4 col-sm-4">
				<img class="pic"src="/prof_pics/{{$professor->prof_pic}}" alt="professor picture">
			</div>
			<div style="margin-top:70px;"class="col">

				<h3><strong>{{$professor->titles . ' '}}</strong> <a style="color:#181818;"href="{{$professor->url}}">{{$professor->f_name . ' ' . $professor->l_name}}</a></h3>

				<h4><strong>({{$professor->university['abrv']}})</strong> <a href="{{$professor->university['url']}}">{{$professor->university['name']}}</a> {{', ' . $professor->university['country']}}</h4>
				<h4>{{$professor->faculty}}</h4>
				<br>
				<a href="/rating/create/{{$professor->id}}" class="btn btn-dark">Rate</a>
				<a href="/professors/{{$professor->id}}/report" class="btn btn-danger float-right">Report</a>
			</div>
		</div>
			<br>
		<div class="row col-sm-12">
		<h3>Overall Score</h3>
	</div>
		<div class="row col-sm-12">
		@if(count($ratings) > 0)
<?php

$starNumber = $overallRating;
echo "<h4 >";

$output=NULL;
for($x=1;$x<=$starNumber;$x++) {
    $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
}
if (strpos($starNumber,'.')) {
    $output .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
    $x++;
}
while ($x<=5) {
    $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $x++;
}
	echo $output;

if ($starNumber <= 2.5) {
echo "<a style='color:red;'>";
}elseif ($starNumber > 2.5 && $starNumber <= 3.5) {
echo "<a style='color:darkorange;'>";
}elseif ($starNumber > 3.5) {
echo "<a style='color:green;'>";
}

?>
&nbsp;{{'' . round($starNumber, 2) . ' / 5'}}
</a>
</h4>
			@else
			<h3 style="color:green;">Rating N/A</h3>
			@endif
			<br>
	</div>

		<div class="row col">
	</div>
		<p> <a href="/faq/#overallscore" style="color:grey;">how do we calculate the overall score?</a></p>
<br>
<br>

					@if(count($ratings) > 0)
				<h4>Courses:</h4>
				<ul>
					<?php $header = null; ?>
					@foreach($ratings as $rating)
						@if ($header != $rating->course['code'])
					<li>
					 	{{'  ' . $rating->course['code'] . ' - ' .$rating->course['name'] }}&nbsp;
				 	</li>
				 		<?php $header = $rating->course['code'] ?>
					 	@endif
					@endforeach
				</ul>
					@endif
</div>
<div class="container" style="color:#181818;background-color:#e6e8dc; width:100%; ">
<br>
<h3><span class="" style="color:#9A073C;">|</span> Ratings</h3>
		<?php
		$i=1;
		$r=0;
		?>
		@if(count($ratings) > 0)
		@foreach($ratings as $rating)
	<hr >

</div>
<div style="color:#181818;padding:30px;padding-bottom: 0 !important;padding-bottom: 0 !important;">

<div class="row">
		<p style=""><span class="" style="color:#9A073C;"><strong>{{$i}} | </strong></span>&nbsp </p>

		<p style="color:#181818;"><strong>Overall Score:</strong></p>
			<p style="margin-bottom:-10px;color:#181818;">


				<div class="col">
	<?php
$pcharacterW = $rating->pcharacter_rating * 0.35;
$pteachingW = $rating->pteaching_rating * 0.4;
$pmasteryW = $rating->pmastery_rating * 0.25;
$starNumber = $pcharacterW + $pteachingW + $pmasteryW;
$output=NULL;
for($x=1;$x<=$starNumber;$x++) {
    $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
}
if (strpos($starNumber,'.')) {
    $output .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
    $x++;
}
while ($x<=5) {
    $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $x++;
}
	echo $output;

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
</div>
		</p>
			<br>
			<br>
</div>

<div class="row">

	<p>
  <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$r}}" aria-expanded="false" aria-controls="collapseExample">
    Details
  </button>
</p>
</div>
<div class="collapse" id="collapseExample{{$r}}">
  <div class="row card-body">
  		<div class="row col-sm-12">
		<p style="margin:10px;color:#181818;"><strong>Course:</strong></p>
			<br>
			<br>
		</div>
	<div class="row">
		<div class="col">

			<p style="margin:10px;color:#181818;">

				<div class="col-sm-12">

			 	{{'  ' . $rating->course['code'] . ' - ' .$rating->course['name'] }}&nbsp;
			 </div>
				<div class="col-sm-12">
<?php

$starNumber = $rating->course_rating;
$output=NULL;
for($x=1;$x<=$starNumber;$x++) {
    $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
}
if (strpos($starNumber,'.')) {
    $output .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
    $x++;
}
while ($x<=5) {
    $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $x++;
}
	echo $output;

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
</div>
		</p>
	</div>

	</div>
  		<div class="row col-sm-12">
		<p style="margin:10px;color:#181818;"><strong>Professor:</strong></p>
			<br>
			<br>
		</div>

  	<div class="row">

	<div class="col-sm-12">

<p style="margin:10px;color:#181818;">

				<div class="col-sm-12">

			 	{{ 'Character' }}&nbsp;
			 </div>

				<div class="col-sm-12">
	<?php

$starNumber = $rating->pcharacter_rating;
$output=NULL;
for($x=1;$x<=$starNumber;$x++) {
    $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
}
if (strpos($starNumber,'.')) {
    $output .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
    $x++;
}
while ($x<=5) {
    $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $x++;
}
	echo $output;

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
</div>
		</p>
	</div>

	<div class="col-sm-12">

<p style="margin:10px;color:#181818;">

				<div class="col-sm-12">
			 	{{ 'Teaching Method' }}&nbsp;
			 </div>

				<div class="col-sm-12">
	<?php

$starNumber = $rating->pteaching_rating;
$output=NULL;
for($x=1;$x<=$starNumber;$x++) {
    $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
}
if (strpos($starNumber,'.')) {
    $output .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
    $x++;
}
while ($x<=5) {
    $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $x++;
}
	echo $output;

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
</div>
		</p>
	</div>



	<div class="col-sm-12">

<p style="margin:10px;color:#181818;">

				<div class="col-sm-12">
			 	{{ 'Course Mastery' }}&nbsp;
			 </div>

				<div class="col-sm-12">
	<?php

$starNumber = $rating->pmastery_rating;
$output=NULL;
for($x=1;$x<=$starNumber;$x++) {
    $output .= '<i class="fa fa-star" aria-hidden="true"></i>';
}
if (strpos($starNumber,'.')) {
    $output .= '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
    $x++;
}
while ($x<=5) {
    $output .= '<i class="fa fa-star-o" aria-hidden="true"></i>';
    $x++;
}
	echo $output;

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
</div>
		</p>
	</div>
</div>

</div>
</div>

	</div>





	<div style="margin-top:10px;"class="col">
		<div class="row">
			<p style="text-align:justify;margin:10px;color:#181818;">{{$rating->comment}}</p>
		</div>

	<div class="row">
<div class="col">
	@if(Auth::check())
	@if($rating->student_id == Auth::id())
	<div class="row pull-right">
		<div class="col">
			<a href="/ratings/{{$rating->id}}/edit" class="btn btn-primary">Edit</a>
		</div>
		<div class="">
			{!! Form::open(['action' => ['RatingsController@destroy', $rating->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
			{{Form::hidden('_method', 'DELETE')}}
			{{Form::submit('Delete', ['class'=>'pull-right btn btn-danger'])}}
			{!! Form::close() !!}
		</div>
	</div>
	@endif
	@endif
	<small><span class="" style="color:#FC5C5C;"><strong>{{$rating->created_at}}</strong></span></small>
</div>
</div>



		<?php
		$i++;
		$r++;
		?>
@endforeach



@else
	<p style="color:#181818;text-align:center;"> There are no ratings for this professor yet. </p>
@endif
</div>
@endsection
