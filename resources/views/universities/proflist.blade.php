<title>{{ config('app.name', 'Laravel') . ' | ' . 'Uni Professors' }}</title>

@extends('layouts.app')
@include('inc.navbar')
@section('content')

<div class="container">

    <div class="row" style="margin-bottom:10px;">
        <h1>Professors</h1>
    </div>

        @if(count($professors) > 0)
@foreach($professors as $professor)

    <div class="well">
    <hr>
        <div class="row">
        <div class="col-md-4 col-sm-4">
            <a href="/professors/{{$professor->id}}"><img class="pic"src="/prof_pics/{{$professor->prof_pic}}" alt="professor picture"></a>
        </div>
        <div class="col-md-8 col-sm-4">
        <br>
        <h3> <a style="color:#181818;"href="/professors/{{$professor->id}}">{{$professor->titles . ' ' . $professor->f_name . ' '. $professor->l_name}}</a></h3>

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

@else
<br>
<p style="text-align:center;"> No professors found </p>
@endif

<br>
<div style="text-align: center;">
<a href="/professors/create" class="btn btn-primary">Add a professor</a>
</div>
</div>
@endsection
