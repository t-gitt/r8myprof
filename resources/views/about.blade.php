<title>{{ config('app.name', 'Laravel') . ' | ' . 'about' }}</title>
@extends('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<div class="container">
<h2><span class="" style="color:#FC5C5C;">|</span> What is r8myprof?</h2>
<br>
<p style="text-align: justify;">
    r8myprof is a platform for students to rate their professors and courses in order to keep a public record of professors' performence. We hope this will help students to better choose their courses, and professors to recieve honest feedback. All ratings are anonymous and no information is shared with a third party.
</p>
<br>
<h2><span class="" style="color:#FC5C5C;">|</span> Who are we?</h2>
<br>
<p style="text-align: justify;">
	This platform was developed by independent students as a side project.</p>
<h2><span class="" style="color:#FC5C5C;">|</span> Why?</h2>
<br>
<p style="text-align: justify;">
	During our 4 years of studying, we noticed little to no effort to address faliure within universities regarding professors' teaching skills. We think that many universities focus on hiring professors with great academic achievements, but don't consider their teaching abilities in the hiring process (such as communications skills, and personal traits). Therefore, -due to lack of feedback channels in these universities- we felt it is <strong>vital</strong> to develop a platform for students to publicly record their expierence and mention its pros and cons.
</p>
<br>
</div>
@endsection