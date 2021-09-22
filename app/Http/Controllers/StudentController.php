<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;
use session;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return student::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @pafram  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }

    public function loginget()
    {

        $data = student::all();

        if ($data) {
          echo $data;
        }
    }

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');
        
        $loginToken = md5("Zakir@123");       //check email
        $user = DB::select('select * from students where email=? and password=?',[$email,$password]);
       
        if ($user) {

            if ($loginToken == md5("Zakir@123")) {

                session()->put('username', $email);
               
                return Response()->json([
                 'success' => $user,
                 'token' => $loginToken
            ]);

            }    
        
        }
        else{
           return Response()->json([
                'success' => false,
                'message' => 'something went wrong'
            ]);     
        }
        
    }

        
    }
}


// git committ