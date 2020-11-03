@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
@php

@endphp
<h1>Report a problem</h1>
<hr>
<h1></h1>
{!! Form::open(['action' => ['ReportsController@store', $professor->id], 'method' => 'POST']) !!}

	<div class="form-group">
		{{Form::label('reportDetails', 'Any problem with the data of this Professor?')}}
        {{Form::textarea('report', '' , ['class' => 'form-control', 'placeholder' => 'Describe the problem here...'])}}
        <input type="hidden" name="prof_id" value="{{$professor->id}}"/>
    </div>
    {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
