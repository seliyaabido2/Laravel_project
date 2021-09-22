<?php

namespace App\Http\Controllers;
use App\Models\student;
use App\Models\btl_model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class BtlModelController extends Controller
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
     * @param  \App\Models\btl_model  $btl_model
     * @return \Illuminate\Http\Response
     */
    public function show(btl_model $btl_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\btl_model  $btl_model
     * @return \Illuminate\Http\Response
     */
    public function edit(btl_model $btl_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\btl_model  $btl_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, btl_model $btl_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\btl_model  $btl_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(btl_model $btl_model)
    {
        //
    }

    
    public function event(request $request)
    {
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $p_id = $request->input('p_id');

        // $user = DB::SELECT("select count(*) from btl_models where date1 >= $date1 AND date2 <= $date2 AND p_id LIKE $p_id ");
        //$user = DB::SELECT("select count(*) from btl_models where date1 >= $date1 AND date2 <= $date2 AND p_id LIKE $p_id ");

        $user = btl_model::where('date1', '>=', $date1)
                           ->where('date2', '<=', $date2)
                           ->where('p_id', '=', $p_id)
                           ->get()->count();


        if ($user)
        {
            return Response()->json([
            'success' => $user]);
        }
        else
        {
             return Response()->json([
             'error' => false]);
        }

    }
}
