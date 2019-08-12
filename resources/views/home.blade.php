<title>{{ config('app.name', 'Laravel') . ' | ' . 'Professors ratings website' }}</title>
@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-style:hidden;">
                <div style="border-style:hidden;"class=""><h1 style="text-align:center">Welcome to r<span class="" style="color:#FC5C5C;">8</span>myprof!</h1>
                </div>

                <div style="text-align:center; border-style:hidden;"class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/professors" class="btn btn-outline-dark">Find a professor</a>
                    <a href="/professors/create" class="btn btn-outline-dark">Add a professor</a>
                    <br>
                    <br>


                </div>
            </div>
        </div>
            <div class="container">
                
        <br>
                @include('inc.professors.home_list')
            </div>
    </div>
</div>
@endsection
