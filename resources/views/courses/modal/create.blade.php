


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
      </div>
<hr>

{!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST']) !!}

	<div class="form-group container">

		{{Form::label('courseInfo', 'Course Info')}}

		{{Form::label('university', 'University')}}
		<div class="row">
			<div class="col">
		 <select name="university"class="form-control">
		 	<option value="">Select a university</option>
@foreach($universities as $university)
	      <option value="{{$university->id}}">{{$university->abrv}} - {{$university->name}}  </option>
		@endforeach
	    </select>	
			</div>
			<div class="col-3">
				<p>Your university is not on the list?</p>
			</div>
			<div class="col">
				<a href="/university/create" class="btn btn-primary">
			  Add a new university!
				</a>
			</div>
		</div>
<br>
	<div class="row">
		<div class="col-2">
		{{Form::text('code','', ['class' => 'form-control', 'placeholder' => 'Course Code'])}}
		</div>
		<div class="col">
		{{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'Course Name'])}}
		</div>

	</div>
		<br>
		@if(env('GOOGLE_RECAPTCHA_KEY'))
     <div class="g-recaptcha"
          data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
     </div>
		@endif
		<br>
		
	{{Form::submit('Add', ['class'=> 'btn btn-primary'])}}

{!! Form::close( ) !!}

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>

