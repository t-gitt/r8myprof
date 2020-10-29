<title>{{ config('app.name', 'Laravel') . ' | ' . 'Professors ratings website' }}</title>
@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-style:hidden;">
                <div style="border-style:hidden; background-color:#e6e8dc;"class=""><h1 style="text-align:center; background-color:#e6e8dc;">Welcome to r<span class="" style="color:#9A073C;">8</span>myprof!</h1>
                </div>
                <div style="text-align:center; border-style:hidden; background-color:#e6e8dc;"class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/professors" class="btn btn-outline-light">Find a professor</a>
                    <a href="/professors/create" class="btn btn-outline-light">Add a professor</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @include('live_search')
    <div style="text-align: center">
        <a href="/university/create" class="btn btn-primary">Add a univeristy</a>
    </div>
</div>
@endsection