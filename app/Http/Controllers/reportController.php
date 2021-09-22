<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;
use DB;

class reportController extends Controller
{
    public function Report(request $request)
    {    
    	 $id = $request->input('id');
         $start_date = $request->input('start_date');
         $end_date = $request->input('end_date');


           $Report = DB::table('Events')
                     ->select('start_date','end_date','event_status','city','type_of_event','apartmant_name','apartmant_code','apartmant_adress','event_organiser','apartmant_google_link')
                     ->where('id', '=', $id)
                     ->where('start_date', '>=', $start_date)
                     ->where('end_date', '<=', $end_date)->get();
        if($Report)
        {
            return Response()->json([
            'success' => $Report]);
        }
        else
        {
            return Response()->json([
            'success' => false]);
        }
    }
}
