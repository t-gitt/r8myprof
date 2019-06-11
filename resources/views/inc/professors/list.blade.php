
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
			<h3>{{$professor->titles . ' ' . $professor->f_name . ' '. $professor->l_name}}</a></h3>
			<small>{{$professor->university_id}}</small>
			<a href="professor/{{$professor->id}}/rating/create" class="btn btn-primary">Rate</a>
		</div>
	@endforeach
@else
	<p style="text-align:center;"> No professors found </p>
@endif

<br><hr>
<a href="/professors/create" class="btn btn-primary">Add a professor</a>