    <title>{{ config('app.name', 'Laravel') . ' | ' . 'Professors' }}</title>

@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
@include('inc.professors.list')
@endsection