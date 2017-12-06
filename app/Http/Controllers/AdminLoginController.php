<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	
	
		return view('admin.index');
    }
	 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	  //return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		/* $username=$request->get('username');
		$password=$request->get('password');

		$valid = admin::where('username', $username)
		->where('password', $password)
		->get();
		
		if($valid->toArray())
		{
			return redirect('/dashboard%7Bm%7D');
		}
		else
		{
			return redirect('/admin/create');
			//dd('your username and password are wrong. try again. http://kotasmartcare.com/portal/admin/create');
		} */
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	     public function memberExcel($type)
    {
		$users = user::all()->toArray();
		return \Excel::create('memberExcel', function($excel) use ($users) {
			$excel->sheet('Registered Member', function($sheet) use ($users)
	        {
				$sheet->fromArray($users);
	        });
		})->download($type);
		///example///
    }
    public function show($id)
    {
	
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

			
		