<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Excel;
use App\user;
use App\user_identity;
use App\identity_proof;
use App\zone;
use App\area;
use App\vendor;
use App\category;
use App\user_enquiry;
use App\user_enquiry_followup;


class USERController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
    public function index()
    {	
		$users = user::all()->toArray();
		return view('user.index', compact('users'));
    }
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		@$identityProofs = identity_proof::find(1)->get();
		$zones = zone::find(1)->get();
		$areas = area::with('zone')
		->where('flag', '=', 0)
		->orderBy("zone_id")
		->get();
		return view('user.create', compact('identityProofs', 'zones', 'areas'));	
		
		/* $y='bb';
		 $user = new user([
          'name' => $x,
          'username' => $y
        ]);
		dd($user);
		exit;
		
		$ip = new IdentityProofs([
          'identity_proof_id' => '1'
        ]);
       $user->save(); */
		//return redirect('/crud');
		//$user->user()->save($user);
		//$user->UserIdentities()->save($ip);
		//exit;
	
	
	  //$article = user::with(['UserIdentities'])->first();
	 // $hotels = IdentityProofs::find(1)->get(); 
	      // $hotels = user::orderBy('id')->with('IdentityProofs')->get();
		     //$hotels = user::all()->load('IdentityProofs');
	 /*  $hotels = user::with(['UserIdentities'])->get();
	  dd($hotels->toArray());
	  exit;
	  */
	 
	/*  $hotels = User::groupBy('id')->get(); 
     $hotel_qualities = User::find('id')->UserIdentities();
	 dd($hotel_qualities);
	 exit;
	 
	 
     return View::make('hotels.index')->with(array('hotels' => $hotels , 'qualities' => $hotel_qualities));
	
	
	 //$identityProofs = user::all()->toArray();
	  $identityProofs = user::with('UserIdentities');
	 // $identityProofs = user::find(1)->identityProofs;
	  dd($identityProofs);
	 exit;
	

	  
	  // $identityProofs = user::with('IdentityProof')->paginate(2);
	   pr($identityProofs);
	   exit;
       return view('welcome', compact('identityProofs'));*/
	  
	   
	   
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
		  'photo' => $getimageName,
		  'zone_id' => $request->get('zone_id'),
		  'area_id' => $request->get('area_id')
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
		
			$sms=str_replace(' ', '+', 'WELCOME - Thank you for registered with KOTA SMART CARE. Please login for take benefits of services. your username: "'.$username.'" and password: "'.$password.'" ');
			$sms_sender='JAINTE';
			$sms=str_replace(' ', '+', $sms);
		file_get_contents('http://103.39.134.40/api/mt/SendSMS?user=phppoetsit&password=9829041695&senderid='.$sms_sender.'&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$sms.'&route=7');
		
		return redirect('/user');
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
	public function fetch_area_ajax($id)
    {
		echo $id;
		exit;
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
        	
    }
	 public function enquirystatus(Request $request)
    {
	
	    $update_id=$request->get('update_id');
	    $enquiry = user_enquiry::find($update_id);
		
		$status=$enquiry->status;
		if($status=='open')
		{
		   $enquiry->status = 'closed';
		}
		else if($status=='closed')
		{
			$enquiry->status = 'open';
		}
        $enquiry->save();
        return redirect('vendorpart/adminCustomerLead');
    } 
	 public function memberEnquiry()
    {
		$users = user::get();
		$zones = zone::get();
		$vendors = vendor::get();
		$categories = category::get();
		return view('user.memberEnquiry', compact('zones', 'vendors', 'categories', 'users'));	
    }
	public function addEnquiry(Request $request)
    {
	     $mobile_no=$request->get('mobile_no');
	     $name=$request->get('name');
          $enquiries = new user_enquiry([
          'name' => $request->get('name'),
		  'user_id' => $request->get('user_id'),
          'mobile_no' => $request->get('mobile_no'),
          'address' => $request->get('address'),
          'vendor_id' => $request->get('vendor_id'),
          'zone_id' => $request->get('zone_id'),
          'category_id' => $request->get('category_id'),
          'query' => $request->get('query'),
        ]);
		$enquiries->save();
			$sms=str_replace(' ', '+', 'Thank you "'.$name.'", your enquiry / Lead generated. we will contact you soon');
			$sms_sender='JAINTE';
			$sms=str_replace(' ', '+', $sms);
		file_get_contents('http://103.39.134.40/api/mt/SendSMS?user=phppoetsit&password=9829041695&senderid='.$sms_sender.'&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$sms.'&route=7');
		return redirect('/user/memberEnquiry');
	}
	 public function followupcomment(Request $request)
    {
	
	      $followup = new user_enquiry_followup([
		  'user_enquiry_id' => $request->get('user_enquiry_id'),
          'user_id' => $request->get('user_id'),
		  'vendor_id' => $request->get('vendor_id'),
          'comment' => $request->get('comment'),
		  'comment_by' => 'Admin'
         ]);
		$followup->save();
		return redirect('/vendorpart/adminCustomerLead');
	}
	 public function vendorfollowupcomment(Request $request)
    {
	      $id=$request->get('vendor_id');
	
	      $followup = new user_enquiry_followup([
		  'user_enquiry_id' => $request->get('user_enquiry_id'),
          'user_id' => $request->get('user_id'),
		  'vendor_id' => $request->get('vendor_id'),
          'comment' => $request->get('comment'),
		  'comment_by' => 'Vendor'
         ]);
		$followup->save();
		return redirect('/lead/'.$id.'');
	}
  
	public function viewMemberEnquiry()
    {	
		$vw = user_enquiry::with('category', 'zone', 'vendor')
		->get();
		return view('user.viewMemberEnquiry', compact('vw'));
    }
	
	 public function orderdata()
    {
	
		 return "I am in";
    }
	 public function enquiryExcel($type)
    {
		$user_enquiry = user_enquiry::all()->toArray();
		return \Excel::create('enquiryExcel', function($excel) use ($user_enquiry) {
			$excel->sheet('Member Enquiry details', function($sheet) use ($user_enquiry)
	        {
				$sheet->fromArray($user_enquiry);
	        });
		})->download($type);
		///example///
    }
	
}

			
		