<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\vendor;
use App\vendor_zone;
use App\vendor_category;
use App\category;
use App\zone;
use App\area;
use App\user_enquiry;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
	    $users = user::get()->count();
		return view('welcome', compact('users'));
    }
	 public function memberIndex()
    { 
			$enquiries = user_enquiry::with('category', 'zone', 'vendor')
			->where('user_id', '=', $id)
			->orderBy("created_at")
		    ->get();
		return view('memberdashboard', compact('enquiries'));
    }
	 public function vendorIndex($id)
    { 
			$enquiries = user_enquiry::with('category', 'zone', 'vendor')
			->where('vendor_id', '=', $id)
			->orderBy("created_at")
		    ->get();
		return view('vendordashboard', compact('enquiries'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function demofunction()
    {
        return view('demo');
    }
	
}
