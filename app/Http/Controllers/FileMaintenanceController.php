<?php 
namespace App\Http\Controllers;

use View;
use Auth;
use App;
use App\Models\Barangay;
use Request;
use Response;

class FileMaintenanceController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getBrgy()
	{
		$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		return View::Make("filemaintenance.barangay")->with("userInfo",$userInfo)->with('mt','fm')->with('cc','pc');
	}
	
	public function brgyList()
	{
		return Barangay::all();
	}
	
	public function addBrgy()
	{
		$actChecker = App::make("App\Http\Controllers\GlobalController")->accountAccessChecker("add");
    	if($actChecker['status'] == "fail")
    	{
    		return  Response::json(array(
			                    'status'  => 'fail',
			                    'message'  => 'Your account accesss level are not allowed to process the request.',
			                ));
    	}

		$cid = Request::get('cid');
		$status = Request::get('status');
    	$name = Request::get('name');
    	$description = Request::get('description');

    	$procategory = (!empty($cid)) ? Barangay::find($cid) :new Barangay();
    	if(!empty($procategory))
    	{
	    	$procategory['name'] = $name;
	    	$procategory['description'] = $description;
	    	$procategory['status'] = (!empty($status)) ? $status : 0;
	    	if($procategory->save())
	    	{
	    		return Response::json(array(
	                'status'  => 'success',
	                'message'  => 'You succesfully added new barangay.',
	            ));
	    	}
    	}
    	return Response::json(array(
            'status'  => 'fail',
            'message'  => 'An error occured while creating the new barangay. Please try again. .',
        ));
	}
}