<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\vendor;
use App\vendor_zone;
use App\vendor_category;
use App\category;
use App\zone;
use App\area;
use App\user_enquiry;
use App\user_enquiry_followup;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$vendors = vendor::all()->toArray();
			//$vendors = vendor::leftJoin('vendor_zone', 'vendor.id', '=', 'vendor_zone.vendor_id')
			//->get();
			//dd($vendors->toArray());
			//exit;
			return view('vendorpart.index', compact('vendors'));
	}
	
	public function adminCustomerLead()
    {
	        $enquiries = user_enquiry::with('category', 'zone', 'vendor', 'user_enquiry_followup')
			->orderBy("created_at")
		    ->get();
			return view('vendorpart.adminCustomerLead', compact('enquiries'));
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @$categories = category::get();
		$zones = zone::find(1)->get();
		return view('vendorpart.create', compact('categories', 'zones'));	
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
			$request->photo->move(public_path('images/vendor'), $getimageName);
			$name = $request->get('name');
			$names = explode(" ", $name);
								$acronym = "";
								foreach ($names as $w) {
								$acronym .= $w[0];
								}
			$journalName = str_replace(' ', '', $name);
			$userName=strtolower($journalName);

			
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
		return redirect('/vendorpart');
  }
 
	public function vendorExcel($type)
    {
		$vendors = vendor::all()->toArray();
		return \Excel::create('vendorExcel', function($excel) use ($vendors) {
			$excel->sheet('Registered Vendor', function($sheet) use ($vendors)
	        {
				$sheet->fromArray($vendors);
	        });
		})->download($type);
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
