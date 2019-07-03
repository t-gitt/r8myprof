
<h1>Professors</h1>
<form action="/filter" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="keyword"
            placeholder="Search in"> 
		 <select name="filter"class="form-control">
		 	<option value="professor">Professors</option>
	        <option value="university">Universities</option>
	        <option value="country">Countries</option>
	    </select>	
                </div>
</form>
<div class="container">

@if(count($professors) > 0)
	@foreach($professors as $professor)
<hr>
		<div class="well">
			<div class="row">
			<div class="col-md-4 col-sm-4">
				<div >
					<a href="professors/{{$professor->id}}"><img class="pic"src="/storage/prof_pics/{{$professor->prof_pic}}" alt="professor picture"></a>
		 		</div>
			</div>
			<div class="col">
			<br>
			<div class="row">
			<h3> <a style="color:#181818;"href="professors/{{$professor->id}}">{{$professor->titles . ' ' . $professor->f_name . ' '. $professor->l_name}}</a></h3>




			<p style="color:grey;">&nbsp; <strong>{{$professor->university['abrv'] . ', ' . $professor->university['country']}}</strong></p>
		</div>
			<div class="row">
				@if(count($professor->ratings) > 0)

				<h2>
				<?php
								$ratingSum = 0;
							foreach ($professor->ratings as $rating) {

        // get ratings sum
        $pcharacterSum = $rating->sum('pcharacter_rating');
        $pteachingSum = $rating->sum('pteaching_rating');
        $pmasterySum = $rating->sum('pmastery_rating');

        // calculate weight average of sum (teaching = .4 | character/mastery = .3)
        $pcharacterWAvg = $pcharacterSum * 0.35;
        $pteachingWAvg = $pteachingSum * 0.4;
        $pmasteryWAvg = $pmasterySum * 0.25;

								$ratingSum = $pcharacterWAvg + $pteachingWAvg + $pmasteryWAvg;
							}

				$starNumber = $ratingSum / count($professor->ratings);

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
				{{'  ' . round($starNumber,2) . ' / 5'}}
				</a>
			</h2>
				@else
				<p>ratings N/A</p>
				@endif
			<div style="text-align:right;"class="col">
				<a href="/rating/create/{{$professor->id}}" style="color:white;"class="btn btn-dark">Rate</a>
			</div>
			</div>
			<div class="row">
				<p style="margin-top:8px;"><a style="color:grey; text-decoration: underline;"href="/professors/{{$professor->id}}">Read what students think!</a></p>
				
			</div>
		</div>
			</div>
			<br>
		</div>
	@endforeach
	  {{ $professors->links() }}
@else
	<p style="text-align:center;"> No professors found </p>
@endif

<br>
<div style="text-align: center;">
<a href="/professors/create" class="btn btn-dark">Add a professor</a>
</div>
</div>