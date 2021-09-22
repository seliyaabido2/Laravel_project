<?php

namespace App\Http\Controllers;

use App\Models\lead_check;
use App\Models\lead;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class LeadCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lead_check  $lead_check
     * @return \Illuminate\Http\Response
     */
    public function show(lead_check $lead_check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lead_check  $lead_check
     * @return \Illuminate\Http\Response
     */
    public function edit(lead_check $lead_check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lead_check  $lead_check
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lead_check $lead_check)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lead_check  $lead_check
     * @return \Illuminate\Http\Response
     */
    public function destroy(lead_check $lead_check)
    {
        //
    }

    public function register(Request $request)
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
        ->where('lead_checks.ragister', '=', 'Yes')
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
}
