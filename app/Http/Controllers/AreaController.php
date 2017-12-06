<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\area;
use App\zone;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
		$areas = Area::with('zone')
		->where('flag', '=', 0)
		->orderBy("zone_id")
		->get();
	    return view('area.index', compact('areas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    @$zones = Zone::find(1)->get();
		return view('area.create', compact('zones'));	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$areas = new Area([
		'zone_id' => $request->get('zone_id'),
		'name' => $request->get('name')
		]);
		$areas->save();
		return redirect('/area');
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
		@$zones = Zone::find(1)->get();
        @$areas = Area::find($id);
        return view('area.edit', compact('areas','id', 'zones'));
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
        $areas = Area::find($id);
		$areas->zone_id = $request->get('zone_id');
        $areas->name = $request->get('name');
        $areas->save();
        return redirect('/area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areas = Area::find($id);
		$areas->flag = 1;
        $areas->save();
        return redirect('/area');
    }
}
