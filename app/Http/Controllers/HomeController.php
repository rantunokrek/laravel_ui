<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //deposite money
 public function deposite()
    {
        return view('deposite');
    }
    //resen mail m
 public function resend()
    {
      
    }
    //user details
public function userDetail($id)
    {
     $id =  Crypt::decryptString($id);
      echo $id;
      //DB::table('users')->where('id', $id)->first();
    }


public function passHashing(Request $anyname){
    $pass = Hash::make($anyname->password);
    echo $pass;
}



}
