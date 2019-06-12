@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/professors/create" class="btn btn-dark">Add a professor</a>
                    <a href="/ratings/create" class="btn btn-dark">Rate a professor</a>
                    <br>
                    <br>

<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="query"
            placeholder="Search professors"> 
                </div>
</form>

                </div>
            </div>
        </div>
            <div class="container">
                
                @include('inc.professors.list')
            </div>
    </div>
</div>
@endsection
