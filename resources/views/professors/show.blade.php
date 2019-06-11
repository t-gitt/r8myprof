@extend('layouts.app')

<!--navbar-->
@include('inc.navbar')
@section('content')
<ul>
<li>{{'Name: ' . $professor->f_name . ' ' . $professor->l_name}}</li>
<li>{{'University: ' . $professor->university_id}}</li>
</ul>
@endsection