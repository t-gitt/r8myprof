
<h1>Professors</h1>

<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="query"
            placeholder="Search professors"> 
                </div>
</form>
<hr>

@if(count($professors) > 0)
	@foreach($professors as $professor)
		<div class="well">
			<div class="row">
			<h3> <a href="professors/{{$professor->id}}">{{$professor->titles . ' ' . $professor->f_name . ' '. $professor->l_name}}</a></h3>
			<p style="color:darkorange;"> . {{$professor->university['abrv']}}</p>
			</div>
			<div class="col-md-4 col-sm-4">
				<img style="width:30%; border-radius: 50%;" src="/storage/prof_pics/{{$professor->prof_pic}}" alt="professor picture">
			</div>
			<br>
			<a href="/rating/create/{{$professor->id}}" class="btn btn-primary">Rate</a>
		</div>
		<hr>
	@endforeach
@else
	<p style="text-align:center;"> No professors found </p>
@endif

<br>
<a href="/professors/create" class="btn btn-dark">Add a professor</a>