@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<ul>
			<div class="col-md-4 col-sm-4">
				<img style="width:30%; border-radius: 50%;" src="/storage/prof_pics/{{$professor->prof_pic}}" alt="professor picture">
			</div>
			<br>
			<h3 style="color:green;">3.05/5</h3>
			<br>
<li><a href="{{$professor->url}}">{{'Name: ' . $professor->titles . ' ' . $professor->f_name . ' ' . $professor->l_name}}</a></li>
<li>{{'University: ' . $professor->university['name'] . ' - ' . $professor->university['abrv']}}</li>

			<a href="/rating/create/{{$professor->id}}" class="btn btn-dark">Rate</a>
</ul>

<br>
<h3>Ratings:</h3>
<br>
<div class="container" style="background-color:#181818; width:90%;">
	<ul>
<li style="color:white;"><div>
	<div class="row">
		<p style="margin:10px;color:white;">{{'Course: ' . 'Software Engineering'}}</p>
		<p style="margin:10px;color:orange;">{{'3.00' . '/5'}}</p>
	</div>
	<div class="row">
		<p style="margin:10px;color:white;">{{'Proin et turpis tristique, congue erat in, vestibulum tellus. Duis in nisl odio. Nullam quis tincidunt quam. Aliquam nunc magna, vestibulum ut maximus nec, aliquet et risus. Cras eu lectus cursus, gravida nunc sit amet, blandit nunc. Suspendisse sed est fringilla, ornare neque et, venenatis sapien. Donec aliquam dolor id vulputate ullamcorper. Morbi quis elementum diam.'}}</p>
	</div>
</div></li>

	<hr>

<li style="color:white;"><div>
	<div class="row">
		<p style="margin:10px;color:white;">{{'Course: ' . 'Software Engineering'}}</p>
		<p style="margin:10px;color:orange;">{{'3.00' . '/5'}}</p>
	</div>
	<div class="row">
		<p style="margin:10px;color:white;">{{'Proin et turpis tristique, congue erat in, vestibulum tellus. Duis in nisl odio. Nullam quis tincidunt quam. Aliquam nunc magna, vestibulum ut maximus nec, aliquet et risus. Cras eu lectus cursus, gravida nunc sit amet, blandit nunc. Suspendisse sed est fringilla, ornare neque et, venenatis sapien. Donec aliquam dolor id vulputate ullamcorper. Morbi quis elementum diam.'}}</p>
	</div>
</div>

</div>
@endsection