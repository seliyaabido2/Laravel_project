<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\btl_model;
use App\Models\lead;
use Illuminate\Support\Str;
use Session;
use DB;


class DashboardController extends Controller
{
    public function dashboard(request $request){

    	// for Total Event
        session::get('email');
    	$utm_medium = $request->input('utm_medium');
        $created_at1 = $request->input('created_at1');
        $created_at2 = $request->input('created_at2');


        $totalEvent = btl_model::where('date1', '>=', $created_at1)
                           ->where('date2', '<=', $created_at2)
                           ->where('p_id', '=', $utm_medium)
                           ->get()->count();

        // for Total lead

        $totalLead = lead::whereRaw("utm_source IN('event','btl_event')")
                      ->where('created_at', '>=', $created_at1)
                      ->where('created_at', '<=', $created_at2)
                      ->where('utm_medium', '=', $utm_medium)
                      ->get()->count();

        // For Total Register

        $totalRegister = DB::table('leads')
        ->select('*')
        ->join('lead_checks', 'lead_checks.lead_id', '=', 'leads.id')
        ->whereRaw("leads.utm_source IN('Event','BTL_Event')")
        ->where('leads.created_at', '>=', $created_at1)
        ->where('leads.created_at', '<=', $created_at2)
        ->where('leads.utm_medium', '=', $utm_medium)
        ->where('lead_checks.ragister', '=', 'Yes')
        ->get()->count();

        // For Total Recharge

        $totalRecharge = DB::table('leads')
        ->select('*')
        ->join('lead_checks', 'lead_checks.lead_id', '=', 'leads.id')
        ->whereRaw("leads.utm_source IN('Event','BTL_Event')")
        ->where('leads.created_at', '>=', $created_at1)
        ->where('leads.created_at', '<=', $created_at2)
        ->where('leads.utm_medium', '=', $utm_medium)
        ->where('lead_checks.recharge', '=', 'Yes')
        ->get()->count();


        //For Profile name

        // $id = $request->input('id');

        $profileName = DB::table('profiles')
        ->select('name')
        ->where('id', '=', $utm_medium)->get();




        if (!empty($totalEvent) && !empty($totalLead) && !empty($totalRegister) && !empty($totalRecharge))
        {
            return Response()->json([
            'totalEvent' => $totalEvent,
            'totalLead' => $totalLead,
            'totalRegister' => $totalRegister,
            'totalRecharge' => $totalRecharge,
            'profileName' => $profileName,
     
        ]);
        }
        else
        {
             return Response()->json([
             'error' => false]);
        } 




    }


}


 