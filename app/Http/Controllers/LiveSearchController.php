<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\University;
use DB;

class LiveSearchController extends Controller
{
    public function action(Request $request)
    {
     if($request->ajax()){
      $output = '';
      $query = $request->get('query');
      if($query != ''){
       $data = DB::table('universities')
         ->where('country', 'like', '%'.$query.'%')
         ->orwhere('name', 'like', '%'.$query.'%')
         ->orwhere('abrv', 'like', '%'.$query.'%')
         ->orderBy('id', 'asc')
         ->get();
      }else{
       $data = DB::table('universities')
         ->orderBy('id', 'asc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0){
       foreach($data as $row){
        $output .= '
        <tr>
         <td><a href="/university/'.$row->id.'">'.$row->name.'</td>
         <td>'.$row->abrv.'</td>
         <td>'.$row->country.'</td>
        </tr>
        ';
       }
      }
      else{
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      echo json_encode($data);
     }
    }
}
