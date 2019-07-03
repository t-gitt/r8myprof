


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a new course</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
<hr>

{!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}

	<div class="form-group container">

		<h3>{{Form::label('courseInfo', 'Course Info')}}</h3>
		<br>

		{{Form::label('university', 'University')}}
		<div class="row">
			<div class="col">
				<p>{{$professor->university['name']}}</p>
			</div>
		</div>
<br>
	<div class="row">
		<div class="col-4">
		{{Form::text('code','', ['class' => 'form-control', 'placeholder' => 'Course Code'])}}
		</div>
		<div class="col">
		{{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
		</div>

	</div>
		<br>
		<input type="hidden" value="{{$professor->university['id']}}" name="university_id">
		<input type="hidden" value="{{$professor->id}}" name="prof_id">
		
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

      </div>
{!! Form::close( ) !!}
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

  </div>
</div>
</div>


