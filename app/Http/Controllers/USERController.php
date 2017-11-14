<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\user_identity;


class USERController extends Controller
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
	 //$identityProofs = user::all()->toArray();
	  $identityProofs = user::with('UserIdentities');
	 // $identityProofs = user::find(1)->identityProofs;
	  dd($identityProofs);
	 exit;
	

	  
	  // $identityProofs = user::with('IdentityProof')->paginate(2);
	   pr($identityProofs);
	   exit;
       return view('welcome', compact('identityProofs'));
	  
	   
	   
       return view('user.create', compact('identityProofs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $crud = new Crud([
          'title' => $request->get('title'),
          'post' => $request->get('post')
        ]);
        $crud->save();
		return redirect('/crud');
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
}