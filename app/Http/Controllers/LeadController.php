<?php

namespace App\Http\Controllers;

use App\Models\lead;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class LeadController extends Controller
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
     * @param  \App\Models\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(lead $lead)
    {
        //
    }

    public function lead(request $request)
    {
        $name = $request->input('name');
        $utm_source = $request->input('utm_source');
        $utm_medium = $request->input('utm_medium');
        $created_at1 = $request->input('created_at1');
        $created_at2 = $request->input('created_at2');
           
        $user = lead::whereRaw("utm_source IN('event','btl_event')")
                      ->where('created_at', '>=', $created_at1)
                      ->where('created_at', '<=', $created_at2)
                      ->where('utm_medium', '=', $utm_medium)
                      ->get()->count();

        if($user)
        {
            return Response()->json([
            'success' => $user]);
        }
        else
        {
            return Response()->json([
            'success' => false]);
        }

    }

    // 

}




