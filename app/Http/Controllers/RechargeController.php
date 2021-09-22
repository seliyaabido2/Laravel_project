<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recharge;
use Illuminate\Support\Str;
use DB;


public function recharge(Request $request)
    {

        $utm_medium = $request->input('utm_medium');
        $created_at1 = $request->input('created_at1');
        $created_at2 = $request->input('created_at2');


        $user1 = DB::table('leads')
        ->select('*')
        ->join('lead_checks', 'lead_checks.lead_id', '=', 'leads.id')
        ->whereRaw("leads.utm_source IN('Event','BTL_Event')")
        ->where('leads.created_at', '>=', $created_at1)
        ->where('leads.created_at', '<=', $created_at2)
        ->where('leads.utm_medium', '=', $utm_medium)
        ->where('lead_checks.recharge', '=', 'Yes')
        ->get()->count();
       

        if($user1)
        {
            return Response()->json([
            'success' => $user1]);
        }
        else
        {
            return Response()->json([
            'success' => false]);
        }


    }
