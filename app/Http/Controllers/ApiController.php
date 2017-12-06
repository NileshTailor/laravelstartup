<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use App\user;
use App\user_identity;
use App\identity_proof;
use App\category;
use App\zone;
use App\area;
use App\vendor_zone;
use App\vendor_category;
use App\vendor;
use App\admin;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
	 */
	 
	  function userRegistration(request $request)
    {
			$this->validate($request, [
			// check validtion for image or file
			'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			]);
			// rename image name or file name 
			$getimageName = time().'.'.$request->photo->getClientOriginalExtension();
			$request->photo->move(public_path('images'), $getimageName);
			$name = $request->get('name');
			$names = explode(" ", $name);
								$acronym = "";
								foreach ($names as $w) {
								$acronym .= $w[0];
								}
			$journalName = str_replace(' ', '', $name);
			$userName=strtolower($journalName);
            $mobile_no=$request->get('mobile_no');
			
          $user = new user([
          'name' => $request->get('name'),
          'username' => '',
          'password' => '',
          'dob' => date('Y-m-d', strtotime($request->get('dob'))),
          'mobile_no' => $request->get('mobile_no'),
          'spouse_name' => $request->get('spouse_name'),	
          'spouse_mobile_no' => $request->get('spouse_mobile_no'),
          'email' => $request->get('email'),
          'land_line_no' => $request->get('land_line_no'),
          'father_name' => $request->get('father_name'),
          'address' => $request->get('address'),
          'landmark' => $request->get('landmark'),
          'hobby' => $request->get('hobby'),
          'emergancy_contact_detail' => $request->get('emergancy_contact_detail'),
          'annual_income' => $request->get('annual_income'),
          'use_smart_phone' => $request->get('use_smart_phone'),
		  'photo' => $getimageName
        ]);
		$user->save();
		$username=$userName.$user->id;
		$randomNo=(string)mt_rand(1000,9999);
		$password=$acronym.$randomNo;
		$updateUser = user::find($user->id);
        $updateUser->username = $username;
        $updateUser->password = $password;
        $updateUser->save();
		
	 foreach($request->identity_proof_id as $data)
		{
			$iproof = new user_identity([
			  'identity_proof_id' => $data
			]);
			$user->UserIdentities()->save($iproof);
		} 
		
		$sms=str_replace(' ', '+', 'Welcome -  Thank you for registered with KOTA SMART CARE. Please login for take benefits of services. your username: "'.$username.'" and password: "'.$password.'" ');
			$sms_sender='JAINTE';
			$sms=str_replace(' ', '+', $sms);
		file_get_contents('http://103.39.134.40/api/mt/SendSMS?user=phppoetsit&password=9829041695&senderid='.$sms_sender.'&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$sms.'&route=7');
		
		
		//return redirect('/index');
		return redirect('http://kotasmartcare.com/web/registration/');

    }
	
	
	 public function adminlogin(Request $request)
    {
	    //$value='1';
	   // Session::set('variableName', $value);
		$username=$request->get('username');
		$password=$request->get('password');
		$valid = admin::where('username', $username)
		->where('password', $password)
		->get();
		if($valid->toArray())
		{
			return redirect('/dashboard%7Ba%7D');
		}
		else
		{
			return redirect('/admin');
		}
	}
	 public function vendorlogin(Request $request)
    {
	    //$value='1';
	   // Session::set('variableName', $value);
		$username=$request->get('username');
		$password=$request->get('password');
		$valid = admin::where('username', $username)
		->where('password', $password)
		->get();
		if($valid->toArray())
		{
			return redirect('/lead/'.$user_id.'');
		}
		else
		{
			return redirect('http://kotasmartcare.com/web/vendorLogin/');
		}
	}
	 public function userlogin(Request $request)
    {
	    //$value='1';
	   // Session::set('variableName', $value);
		$username=$request->get('username');
		$password=$request->get('password');
		$valid = admin::where('username', $username)
		->where('password', $password)
		->get();
		$user_id=$valid->id;
		if($valid->toArray())
		{
			return redirect('/enquiry/'.$user_id.'');
		}
		else
		{
			return redirect('http://kotasmartcare.com/web/memberLogin/');
		}
	}
	
	
	 function vendorRegistration(request $request)
    {
			$this->validate($request, [
			// check validtion for image or file
			'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			]);
			// rename image name or file name 
			$getimageName = time().'.'.$request->photo->getClientOriginalExtension();
			$request->photo->move(public_path('images/vendor'), $getimageName);
			$name = $request->get('name');
			$names = explode(" ", $name);
								$acronym = "";
								foreach ($names as $w) {
								$acronym .= $w[0];
								}
			$journalName = str_replace(' ', '', $name);
			$userName=strtolower($journalName);
            $mobile_no=$request->get('mobile_no');
			
          $vendor = new vendor([
          'name' => $request->get('name'),
          'username' => '',
          'password' => '',
          'mobile_no' => $request->get('mobile_no'),
          'firm_name' => $request->get('firm_name'),
          'email' => $request->get('email'),
          'land_line_no' => $request->get('land_line_no'),
          'address' => $request->get('address'),
          'landmark' => $request->get('landmark'),
		  'photo' => $getimageName
        ]);
		$vendor->save();
		$username=$userName.$vendor->id;
		$randomNo=(string)mt_rand(1000,9999);
		$password=$acronym.$randomNo;
		$updateUser = vendor::find($vendor->id);
        $updateUser->username = $username;
        $updateUser->password = $password;
        $updateUser->save();
		
		 foreach($request->zone_id as $data)
		{
			$zone = new vendor_zone([
			  'zone_id' => $data
			]);
			$vendor->VendorZones()->save($zone);
		} 
		foreach($request->category_id as $data)
		{
			$category = new vendor_category([
			  'category_id' => $data
			]);
			$vendor->VendorCategories()->save($category);
		} 
		
		$sms=str_replace(' ', '+', 'Welcome - Thank you for registered with KOTA SMART CARE.');
			$sms_sender='JAINTE';
			$sms=str_replace(' ', '+', $sms);
		file_get_contents('http://103.39.134.40/api/mt/SendSMS?user=phppoetsit&password=9829041695&senderid='.$sms_sender.'&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$sms.'&route=7');
		
		return redirect('http://kotasmartcare.com/web/vendor-registration-2/');
    }
	
	public function identityProofDetails()
    {
		$identityProofs = identity_proof::find(1)->get();
		$json['data']=$identityProofs;
		return response()->json($json, 201);
		//return view('user.create', compact('identityProofs'));
    }
	
	public function zone()
    {
		$zones = zone::find(1)->get();
		$json['zone']=$zones;
		return response()->json($json, 201);
		//return view('user.create', compact('identityProofs'));
    }
	public function area()
    {
		$areas = area::with('zone')
		->where('flag', '=', 0)
		->orderBy("zone_id")
		->get();
		$json['area']=$areas;
		return response()->json($json, 201);
		//return view('user.create', compact('identityProofs'));
    }
	public function category()
    {
		$categories = category::get();
		$json['category']=$categories;
		return response()->json($json, 201);
		//return view('user.create', compact('identityProofs'));
    }
	public function vendorZonecategories()
    {
	    $zones = zone::with('area')
		->get();
		$categories = category::get();
		$json['category']=$categories;
		$json['zone']=$zones;
		return response()->json($json, 201);
		//return view('user.create', compact('identityProofs'));
    }
	
	public function registrationView()
    {
		$users = user::all()->toArray();
		$json['data']=$users;
		return response()->json($json, 201);
        //return view('user.index', compact('users'));
    }
	
	public function vendorView()
    {
		$vendors = vendor::all()->toArray();
		$json['data']=$vendors;
		return response()->json($json, 201);
        //return view('user.index', compact('users'));
    }
	
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
        $crud = Crud::create($request->all());
		return response()->json($crud, 201);
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
