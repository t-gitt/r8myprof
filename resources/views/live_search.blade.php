<html>
 <head>
  <title>Search based on countries</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 </head>
 <body>
  <br/>
  <div class="container box">
   <h3 style="text-align:center">Smart Search</h3><br />
   <div class="panel panel-default">
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search about a country, a university or its abbreviation" />
    
     </div>
     <div class="table-responsive">
      <h5 style="text-align:center">Total number of universities : <span id="total_records"></span></h5>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Name</th>
         <th>Abbreviation</th>
         <th>Country</th>
        </tr>
       </thead>
       <tbody>
            
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 fetch_uni_data();

 function fetch_uni_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_uni_data(query);
 });
});
</script>