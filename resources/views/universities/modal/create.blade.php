

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add a new university</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
<hr>
{!! Form::open(['action' => 'UniversitiesController@store', 'method' => 'POST']) !!}

	<div class="container form-group">

		{{Form::label('name', 'University')}}
	<div class="row">
		<div class="col">
		{{Form::text('abrv','', ['class' => 'form-control', 'placeholder' => 'Abbreviation <UTS>'])}}
		</div>
		<div class="col">
		{{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'University\'s Name'])}}
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
	<br>
	<br>

{!! Form::close( ) !!}

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>


