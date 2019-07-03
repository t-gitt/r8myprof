@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<div class="container">
<ul>
	<div class="row">
			<div class="col-md-4 col-sm-4">
				<img class="pic"src="/storage/prof_pics/{{$professor->prof_pic}}" alt="professor picture">
			</div>
			<div style="margin-top:70px;"class="col">

				<h3><strong>{{$professor->titles . ' '}}</strong> <a style="color:#181818;"href="{{$professor->url}}">{{$professor->f_name . ' ' . $professor->l_name}}</a></h3>
				<h4><strong>({{$professor->university['abrv']}})</strong> {{$professor->university['name'] . ', ' . $professor->university['country']}}</h4>
				<br>
				<a href="/rating/create/{{$professor->id}}" class="btn btn-dark">Rate</a>
			</div>
		</div>
			<br>
		<div class="row col">
		<h3>Overall Score</h3>
	</div>
		<div class="row col">
		@if(count($ratings) > 0)
<?php

$starNumber = $overallRating;
echo "<h3 >";

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
</h3>
		</h3>
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
</div>
<div class="container" style="color:#181818;background-color:white; width:100%; ">
<br>	
<h3><span class="" style="color:#FC5C5C;">|</span> Ratings</h3>
		<?php
		$i=1;
		?>
		@if(count($ratings) > 0)
		@foreach($ratings as $rating)
	<hr >

<div style="color:#181818;padding:30px;">
	<div>
	<div class="row">
		<p style="margin:10px;"><span class="" style="color:#FC5C5C;"><strong>{{$i}} | </strong></span> </p>
	</div>
	<div class="row">
		<p style="margin:10px;color:#181818;"><strong>Course</strong></p>
			<br>
			<br>
		</div>
	<div class="row">
	<div class="col">

<p style="margin:10px;color:#181818;">

			 	{{'  ' . $rating->course['code'] . ' - ' .$rating->course['name'] }}&nbsp;
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
		</p>
	</div>

	</div>
	</div>




<div class="row">
		<p style="margin:10px;color:#181818;"><strong>Professor</strong></p>
			<br>
			<br>
	</div>


<div class="row">
	<div class="col-sm-12">

<p style="margin:10px;color:#181818;">

			 	{{ 'Character' }}&nbsp;
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
		</p>
	</div>

	<div class="col-sm-12">

<p style="margin:10px;color:#181818;">

			 	{{ 'Teaching Method' }}&nbsp;
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
		</p>
	</div>



	<div class="col-sm-12">

<p style="margin:10px;color:#181818;">

			 	{{ 'Course Mastery' }}&nbsp;
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
		</p>
	</div>




	</div>




	<div style="margin-top:10px;"class="col">
	@if(Auth::check())	
	@if($rating->student_id == Auth::id())
	{!! Form::open(['action' => ['RatingsController@destroy', $rating->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
	{{Form::hidden('_method', 'DELETE')}}
	{{Form::submit('Delete', ['class'=>'pull-right btn btn-danger'])}}
	{!! Form::close() !!}
	@endif
	@endif
	<div class="row">
		<p style="margin:10px;color:#181818;">{{$rating->comment}}</p>
	</div>

	<small><span class="" style="color:#FC5C5C;"><strong>{{$rating->created_at}}</strong></span></small>

	
</div>

</div>

		<?php
		$i++;
		?>
@endforeach



@else
	<p style="color:#181818;text-align:center;"> There are no ratings for this professor yet. </p>
@endif
</div>
@endsection