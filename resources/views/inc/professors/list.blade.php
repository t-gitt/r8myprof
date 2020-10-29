
<div class="container">

		<div class="row" style="margin-bottom:10px;">
			<h1>Professors</h1>
		</div>


			<form action="/filter" method="GET" role="search" style="width: 100%;">
			    {{ csrf_field() }}

	<div class="form-group">
		<div class="row">
			        <div class="mt-2 col-12 col-lg-3">
			                <input name="professor"type="text"class=" form-control"placeholder="Name">
			            </div>

			        <div class="mt-2 col-12 col-lg-4">
			                <select name="university" id="university" class=" form-control">
			                    <option value="all">All Univeristies</option>
			                        @if(count($universities) > 0)
			                            @foreach($universities as $university)
			                                <option value="{{$university->id}}">{{$university->name}}</option>
			                            @endforeach
			                        @endif
			                </select>

						</div>
			        <div class="mt-2 col-12 col-lg-3 ">
			                <select name="sort" id="sort" class=" form-control">
			                    <option value="new">Sort by new</option>
			                    <option value="old">Sort by old</option>
			                    <option value="bestRate">Sort by best rated</option>
			                    <option value="lowestRate">Sort by worst rated</option>
			                </select>
			            </div>

			        <div class="mt-2 col-12 col-lg-2 ">
			                <button value="submit"class=" form-control btn btn-dark"> <span class="fa fa-search"></span> </button>
			        </div>
			    </div>

			</div>
			    </form>
			    <div class="row" style="text-align: justify;">
				    <div class="col">
				    	<a href="/professors/" class="btn alp <?php if($letter === 'all') {echo 'alphabets'; } ?>">All</a>
				    	<a href="/professor/a" class="btn alp <?php if($letter === 'a') {echo 'alphabets'; } ?>">A</a>
				    	<a href="/professor/b" class="btn alp <?php if($letter === 'b') {echo 'alphabets'; } ?>">B</a>
				    	<a href="/professor/c" class="btn alp <?php if($letter === 'c') {echo 'alphabets'; } ?>">C</a>
				    	<a href="/professor/d" class="btn alp <?php if($letter === 'd') {echo 'alphabets'; } ?>">D</a>
				    	<a href="/professor/e" class="btn alp <?php if($letter === 'e') {echo 'alphabets'; } ?>">E</a>
				    	<a href="/professor/f" class="btn alp <?php if($letter === 'f') {echo 'alphabets'; } ?>">F</a>
				    	<a href="/professor/g" class="btn alp <?php if($letter === 'g') {echo 'alphabets'; } ?>">G</a>
				    	<a href="/professor/h" class="btn alp <?php if($letter === 'h') {echo 'alphabets'; } ?>">H</a>
				    	<a href="/professor/i" class="btn alp <?php if($letter === 'i') {echo 'alphabets'; } ?>">I</a>
				    	<a href="/professor/j" class="btn alp <?php if($letter === 'j') {echo 'alphabets'; } ?>">J</a>
				    	<a href="/professor/k" class="btn alp <?php if($letter === 'k') {echo 'alphabets'; } ?>">K</a>
				    	<a href="/professor/l" class="btn alp <?php if($letter === 'l') {echo 'alphabets'; } ?>">L</a>
				    	<a href="/professor/m" class="btn alp <?php if($letter === 'm') {echo 'alphabets'; } ?>">M</a>
				    	<a href="/professor/n" class="btn alp <?php if($letter === 'n') {echo 'alphabets'; } ?>">N</a>
				    	<a href="/professor/o" class="btn alp <?php if($letter === 'o') {echo 'alphabets'; } ?>">O</a>
				    	<a href="/professor/p" class="btn alp <?php if($letter === 'p') {echo 'alphabets'; } ?>">P</a>
				    	<a href="/professor/q" class="btn alp <?php if($letter === 'q') {echo 'alphabets'; } ?>">Q</a>
				    	<a href="/professor/r" class="btn alp <?php if($letter === 'r') {echo 'alphabets'; } ?>">R</a>
				    	<a href="/professor/s" class="btn alp <?php if($letter === 's') {echo 'alphabets'; } ?>">S</a>
				    	<a href="/professor/t" class="btn alp <?php if($letter === 't') {echo 'alphabets'; } ?>">T</a>
				    	<a href="/professor/u" class="btn alp <?php if($letter === 'u') {echo 'alphabets'; } ?>">U</a>
				    	<a href="/professor/v" class="btn alp <?php if($letter === 'v') {echo 'alphabets'; } ?>">V</a>
				    	<a href="/professor/w" class="btn alp <?php if($letter === 'w') {echo 'alphabets'; } ?>">W</a>
				    	<a href="/professor/x" class="btn alp <?php if($letter === 'x') {echo 'alphabets'; } ?>">X</a>
				    	<a href="/professor/y" class="btn alp <?php if($letter === 'y') {echo 'alphabets'; } ?>">Y</a>
				    	<a href="/professor/z" class="btn alp <?php if($letter === 'z') {echo 'alphabets'; } ?>">Z</a>

				    </div>
			    </div>
			@if(count($professors) > 0)
	@foreach($professors as $professor)
<?php
($professor->ratings);
?>
		<div class="well">
		<hr>
			<div class="row">
			<div class="col-md-4 col-sm-4">
				<a href="/professors/{{$professor->id}}"><img class="pic"src="/prof_pics/{{$professor->prof_pic}}" alt="professor picture"></a>
			</div>
			<div class="col-md-8 col-sm-4">
			<br>
			<h3> <a style="color:#181818;"href="/professors/{{$professor->id}}">{{$professor->titles . ' ' . $professor->f_name . ' '. $professor->l_name}}</a></h3>
			<p style="color:grey;">&nbsp; <strong><a style="color:grey;"href="{{$professor->university['url']}}">{{$professor->university['abrv'] . ', '}}</a> {{ $professor->university['country']}}</strong></p>
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
			<div class="row ">
			<div style="padding-left: 0 !important;"class="col-8">
				<div class="col">
					<p style="margin-top:8px;"><a style="color:grey; text-decoration: underline;"href="/professors/{{$professor->id}}">Read what students think!</a></p>
				</div>
			</div>
			<div style="text-align:right;"class="col-4">

				<a href="/rating/create/{{$professor->id}}" style="color:white;"class="btn btn-dark">Rate</a>
			</div>

			</div>
		</div>
			</div>
			<br>
		</div>
	@endforeach
	  {{ $professors->appends(request()->input())->links() }}
@else
<br>
	<p style="text-align:center;"> No professors found </p>
@endif

<br>
<div style="text-align: center;">
<a href="/professors/create" class="btn btn-primary">Add a professor</a>
</div>
</div>
