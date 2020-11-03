<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Report a problem</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
  <hr>
  
  {!! Form::open(['action' => 'ProfessorsController@storeReport', 'method' => 'POST']) !!}
  
      <div class="form-group container">
  
          <h3>{{Form::label('problemDetails', 'Problem Details')}}</h3>
          <br>
      <div class="row">
          <div class="col-12 col-lg-4">
          {{Form::textarea('descriptipn','', ['class' => 'form-control', 'placeholder' => 'Describe the problem please'])}}
          </div>
      </div>
          <br>
          <input type="hidden" value="{{$professor->id}}" name="prof_id">
          
      {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
  
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
  
  
  