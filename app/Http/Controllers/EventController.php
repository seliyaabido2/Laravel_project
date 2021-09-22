<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Event()
    {  
         // today Event
           $ActiveEvent = DB::table('Events')
                     ->select('start_date','end_date','event_status','city','type_of_event','apartmant_name','apartmant_code','apartmant_adress','event_organiser','apartmant_google_link')
                     ->where('start_date', '=', Carbon::now()->format('y-m-d'))->get();


         // panding Event
               $PandingEvent = DB::table('Events')
                     ->select('start_date','end_date','event_status','city','type_of_event','apartmant_name','apartmant_code','apartmant_adress','event_organiser','apartmant_google_link')
                     ->where('end_date', '<', Carbon::now()->format('y-m-d'))
                     ->where('event_status', '!=', 'complate')->get();

         // Upcoming Event
               $Upcoming = DB::table('Events')
                     ->select('start_date','end_date','event_status','city','type_of_event','apartmant_name','apartmant_code','apartmant_adress','event_organiser','apartmant_google_link')
                     ->where('start_date', '>', Carbon::now()->format('y-m-d'))->get();

            // Complate Event
               $complate = DB::table('Events')
                     ->select('start_date','end_date','event_status','city','type_of_event','apartmant_name','apartmant_code','apartmant_adress','event_organiser','apartmant_google_link')
                     ->where('event_status', '=', 'complate')->get();
    
           
           if (!empty($ActiveEvent) && !empty($PandingEvent))
           {
               return Response()->json([
               'ActiveEvent' => $ActiveEvent,
               'PandingEvent' => $PandingEvent,
               'Upcoming' => $Upcoming,
               'Complate' => $complate]);
           }
           else
           {
                return Response()->json([
                'error' => false]);
           }



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
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //
    }
}
