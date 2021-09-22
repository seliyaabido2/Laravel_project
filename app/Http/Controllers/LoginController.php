<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    	$email = $request->input('email');
        $password = $request->input('password');
        $loginToken = md5("akshayakalpa@milkpromoter"); 
		$qery = DB::select('select * from btl_promoter_login where email=? and password=?',[$email,$password]);
        // $qery="SELECT * FROM btl_promoter_login WHERE email = '$email' AND password = '$password'";
		$run=mysqli_query($conn, $qery);

		if (mysqli_num_rows($run) > 0)
		{
			 if ($loginToken == md5("akshayakalpa@milkpromoter"))
			 {
			 	$output=mysqli_fetch_all($run, MYSQLI_ASSOC);
			 	return Response()->json([
                 'success' => $output,
				 'token' => $loginToken,
				 'status' => true
                ]);
		      }
		    else{
		    	 return Response()->json([
		               	'status' => false,
		               	'message' => "Invalid Token"
		                ]);
		    }    
		}
		else
		{
			return Response()->json([
		               	'status' => false,
		               	'message' => "Invalid Login Credantial"
		                ]);
		    //echo json_encode(array('messege' => 'Invalid Login Credantial', 'status' => false ));
		}
        
    }
}
