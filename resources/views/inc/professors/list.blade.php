

<div class="container">

		<div class="row" style="margin-bottom:10px;">
			<h1>Professors</h1>
		</div>


		<div class="row">
			<form action="/filter" method="GET" role="search" style="width: 100%;">
			    {{ csrf_field() }}
			        <div class="input-group">
			                <input name="professor"type="text"class="form-control"placeholder="Name">
			                <select name="university" id="university" class="form-control">
			                    <option value="all">All Univeristies</option>
			                        @if(count($universities) > 0)
			                            @foreach($universities as $university)
			                                <option value="{{$university->id}}">{{$university->name}}</option>
			                            @endforeach
			                        @endif
			                </select>
			                <select name="sort" id="sort" class="form-control">
			                    <option value="bestRate">Sort by best rated</option>
			                    <option value="lowestRate">Sort by worst rated</option>
			                    <option value="new">Sort by new</option>
			                    <option value="old">Sort by old</option>
			                </select>
			                <button value="submit"class="col-2 form-control btn btn-dark"><span class="fa fa-search"></span></button>
			        </div>

			    </form>
			</div>
			@if(count($professors) > 0)
	@foreach($professors as $professor)
<?php 
($professor->ratings);
?>
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




			<p style="color:grey;">&nbsp; <strong><a style="color:grey;"href="{{$professor->university['url']}}">{{$professor->university['abrv'] . ', '}}</a> {{ $professor->university['country']}}</strong></p>
		</div>
			<div class="row">
				@if(count($professor->ratings) > 0)

				<h2>
				<?php
								$ratingSum = 0;
								$pcharacterSum = 0;
						        $pteachingSum =0;
						        $pmasterySum = 0;
						        $pcharacterWAvg = 0;
						        $pteachingWAvg = 0;
						        $pmasteryWAvg = 0;
						        $pmasterySum = 0;
							foreach ($professor->ratings as $rating) {

        // get ratings sum
        $pcharacterSum = $rating['pcharacter_rating'] + $pcharacterSum;
        $pteachingSum = $rating['pteaching_rating'] + $pteachingSum;
        $pmasterySum = $rating['pmastery_rating'] + $pmasterySum;

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
			<div class="row col-12">
			<div style="padding-left: 0 !important;"class="col-6">
				<p style="margin-top:8px;"><a style="color:grey; text-decoration: underline;"href="/professors/{{$professor->id}}">Read what students think!</a></p>
			</div>
			<div style="text-align:right;"class="col-6">
				<a href="/rating/create/{{$professor->id}}" style="color:white;"class="btn btn-dark">Rate</a>
			</div>
				
			</div>
			</div>
		</div>
			</div>
			<br>
		</div>
	@endforeach
	  {{ $professors->appends(request()->input())->links() }}
@else
	<p style="text-align:center;"> No professors found </p>
@endif

<br>
<div style="text-align: center;">
<a href="/professors/create" class="btn btn-dark">Add a professor</a>
</div>
</div>





<!--
<form action="/filter" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="keyword"
            placeholder="Search for"> 
		 <select name="filter"class="form-control">
		 	<option value="professor">Professors</option>
	        <option value="university">Universities</option>
	        <option value="country">Countries</option>
	    </select>	
                </div>
</form>
-->