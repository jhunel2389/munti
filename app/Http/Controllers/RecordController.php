<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\HouseholdMember;
use App\Models\Barangay;
use Request;
use Auth;
use App;
use View;
use Validator;
use Response;
use Redirect;
use URL;

class RecordController extends Controller
{

	function index()
	{
		$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		return View::Make("records.index")->with("userInfo",$userInfo)->with('mt','re');
	}

    function getRecord($cid)
    {
    	$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
    	$householdInfo = Household::find($cid);
    	$brgy = Barangay::whereStatus(1)->get();
		return View::Make("records.record")->with("userInfo",$userInfo)->with("householdInfo",$householdInfo)->with("brgy",$brgy)->with('mt','re');
    }

    public function householdList()
	{
		return Household::all();
	}

    function getMembers($cid)
    {
    	$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		return View::Make("records.member")->with("userInfo",$userInfo)->with('mt','re');
    }

    function brgySummary($cid)
    {
    	$statisticSummarry = App::make("App\Http\Controllers\GlobalController")->statisticSummarry($cid);
    	$brgyInfo = App::make("App\Http\Controllers\GlobalController")->brgyInfo($cid);
    	$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		return View::Make("records.summary")->with("userInfo",$userInfo)->with('mt','db')->with("brgyInfo",$brgyInfo);
    }

    function savingRecordHousehold()
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
    	$region = Request::get('region');
		$province = Request::get('province');
		$city = Request::get('city');
		$brgy_id = Request::get('brgy_id');
		$household_id_no = Request::get('household_id_no');
		$name_of_respondent = Request::get('name_of_respondent');
		$date = Request::get('date');
		$time_started = Request::get('time_started');
		$interviewer_enumerator = Request::get('interviewer_enumerator');
		$a_1 = Request::get('a_1');
		$a_2 = Request::get('a_2');
		$a_3 = Request::get('a_3');
		$a_4 = Request::get('a_4');
		$b_5 = Request::get('b_5');
		$b_6 = Request::get('b_6');
		$b_7 = Request::get('b_7');
		$b_8 = Request::get('b_8');
		$b_9 = Request::get('b_9');
		$c_10 = Request::get('c_10');
		$encoded_by = Auth::User()['id'];

		$validator = Validator::make(Request::all(), array(
			'region' => 'required',
			'province' => 'required',
			'city' => 'required',
			'brgy_id' => 'required',
			'household_id_no' => 'required',
			'name_of_respondent' => 'required',
			'date' => 'required',
			'time_started' => 'required',
			'interviewer_enumerator' => 'required',
			'a_1' => 'required',
			'a_2' => 'required',
			'a_3' => 'required',
			'a_4' => 'required',
			'b_5' => 'required',
			'b_6' => 'required',
			'b_7' => 'required',
			'b_8' => 'required',
			'b_9' => 'required',
			'c_10' => 'required',
		));

		if ($validator -> fails())
		{
			return  Response::json(array(
	                    'status'  => 'fail',
	                    'message'  => 'Fill out all fields.',
	                ));
		}
		else
		{
			if(!empty($cid))
			{
				$household = Household::find($cid);
			}
			else
			{
				$householdCheck = Household::where('household_id_no','=',$household_id_no)->get();
				if(count($householdCheck) != 0)
				{
					return  Response::json(array(
			                    'status'  => 'fail',
			                    'message'  => 'The given Household Identification is already exist in the system. Please check and try again.',
			                ));
				}
				$household = new Household();
			}

			$household -> region = $region;
			$household -> province = $province;
			$household -> city = $city;
			$household -> brgy_id = $brgy_id;
			$household -> household_id_no = $household_id_no;
			$household -> name_of_respondent = $name_of_respondent;
			$household -> date = date_format(date_create($date),"Y-m-d");
			$household -> time_started = $time_started;
			$household -> interviewer_enumerator = $interviewer_enumerator;
			$household -> a_1 = $a_1;
			$household -> a_2 = $a_2;
			$household -> a_3 = $a_3;
			$household -> a_4 = $a_4;
			$household -> b_5 = $b_5;
			$household -> b_6 = $b_6;
			$household -> b_7 = $b_7;
			$household -> b_8 = $b_8;
			$household -> b_9 = $b_9;
			$household -> c_10 = $c_10;
			$household -> encoded_by = $encoded_by;

			if ($household -> save())
			{
				return Response::json(array(
		                    'status'  => 'success',
		                    'message'  => 'New household record is successfully save/update.',
		                    'postback' => URL::Route('getRecord',$household['id']),
		                ));

		        //return Redirect::route('getRecord',$household['id'])->with('success','New household record is successfully save.');
			}
			else
			{
				return  Response::json(array(
		                    'status'  => 'fail',
		                    'message'  => 'An error occured while creating the new household record. Please try again.',
		                ));
			}
		}
    }

    function addHouseholdMember()
    {
    	$actChecker = App::make("App\Http\Controllers\GlobalController")->accountAccessChecker("add");
    	if($actChecker['status'] == "fail")
    	{
    		return  Response::json(array(
			                    'status'  => 'fail',
			                    'message'  => 'Your account accesss level are not allowed to process the request.',
			                ));
    	}

    	$household_system_id = Request::get('household_system_id');
    	$household_member_no = Request::get('household_member_no');
    	$fname = Request::get('fname');
    	$lname = Request::get('lname');
    	$mname = Request::get('mname');
    	$mem_12 = Request::get('mem_12');
    	$mem_13 = Request::get('mem_13');
    	$sex_14 = Request::get('sex_14');
    	$dob_15 = Request::get('dob_15');
    	$civil_reg_16 = Request::get('civil_reg_16');
    	$stats_17 = Request::get('stats_17');
    	$mem_18 = Request::get('mem_18');
    	$ofw_19 = Request::get('ofw_19');
    	$mem_20 = Request::get('mem_20');
    	$d_21_schooling = Request::get('d_21_schooling');
    	$d_22 = Request::get('d_22');
    	$d_23 = Request::get('d_23');
    	$d_24 = Request::get('d_24');
    	$d_25_a = Request::get('d_25_a');
    	$d_25_b = Request::get('d_25_b');
    	$d_26 = Request::get('d_26');
    	$f_27 = Request::get('f_27');
    	$f_28 = Request::get('f_28');
    	$f_29 = Request::get('f_29');
    	$f_30 = Request::get('f_30');
    	$f_40 = Request::get('f_40');
    	$f_41 = Request::get('f_41');
    	$f_42 = Request::get('f_42');
    	$f_43 = Request::get('f_43');
    	$f_44 = Request::get('f_44');
    	$f_45 = Request::get('f_45');
    	$f_46 = Request::get('f_46');
    	$f_47 = Request::get('f_47');
    	$f_31 = Request::get('f_31');
    	$f_32 = Request::get('f_32');
    	$f_33 = Request::get('f_33');
    	$f_34 = Request::get('f_34');
    	$f_35 = Request::get('f_35');
    	$f_36 = Request::get('f_36');
    	$f_37 = Request::get('f_37');
    	$f_38 = Request::get('f_38');
    	$f_39 = Request::get('f_39');
    	$f_48_a = Request::get('f_48_a');
    	$f_48_b = Request::get('f_48_b');
    	$f_49 = Request::get('f_49');
    	$encoded_by = Request::get('encoded_by');


    	$g_50 = Request::get('g_50');
    	$g_51 = Request::get('g_51');
    	$g_52 = Request::get('g_52');
    	$g_53 = Request::get('g_53');
    	$g_53_b = Request::get('g_53_b');
    	$g_54 = Request::get('g_54');
    	$g_55 = Request::get('g_55');
    	$g_58 = Request::get('g_58');
    	$mem_20 = Request::get('mem_20');
    	$validator = Validator::make(Request::all(), array(
			'household_system_id' => 'required',
			'household_member_no' => 'required',
			'fname' => 'required',
			'lname' => 'required',
			'mname' => 'required',
			'mem_12' => 'required',
			'mem_13' => 'required',
			'sex_14' => 'required',
			'dob_15' => 'required',
			'civil_reg_16' => 'required',
			'stats_17' => 'required',
			'mem_18' => 'required',
			'ofw_19' => 'required',
			'mem_20' => 'required',
			'd_21_schooling' => 'required',
			'd_22' => 'required',
			'd_23' => 'required',
			'd_24' => 'required',
			'd_25_a' => 'required',
			'd_25_b' => 'required',
			'd_26' => 'required',
			'f_27' => 'required',
			'f_28' => 'required',
			'f_29' => 'required',
			'f_30' => 'required',
			'f_40' => 'required',
			'f_41' => 'required',
			'f_42' => 'required',
			'f_43' => 'required',
			'f_44' => 'required',
			'f_45' => 'required',
			'f_46' => 'required',
			'f_47' => 'required',
			'f_31' => 'required',
			'f_32' => 'required',
			'f_33' => 'required',
			'f_34' => 'required',
			'f_35' => 'required',
			'f_36' => 'required',
			'f_37' => 'required',
			'f_38' => 'required',
			'f_39' => 'required',
			'f_48_a' => 'required',
			'f_48_b' => 'required',
			'f_49' => 'required',
			'encoded_by' => 'required',
		));

		if ($validator -> fails())
		{
			return  Response::json(array(
	                    'status'  => 'fail',
	                    'message'  => 'Fill out all fields.',
	                ));
		}
		else
		{

			if(!empty($cid))
			{
				$householdMember = HouseholdMember::find($cid);
			}
			else
			{
				$householdCheck = HouseholdMember::where('household_member_no','=',$household_member_no)->where('household_system_id','=',$household_system_id)->get();
				if(count($householdCheck) != 0)
				{
					return  Response::json(array(
			                    'status'  => 'fail',
			                    'message'  => 'The given Household Member Number is already exist in this particular household. Please check and try again.',
			                ));
				}
				$householdMember = new HouseholdMember();
			}

			$householdMember -> household_system_id = $household_system_id;
			$householdMember -> household_member_no = $household_member_no;
			$householdMember -> fname = $fname;
			$householdMember -> lname = $lname;
			$householdMember -> mname = $mname;
			$householdMember -> mem_12 = $mem_12;
			$householdMember -> mem_13 = $mem_13;
			$householdMember -> sex_14 = $sex_14;
			$householdMember -> dob_15 = date_format(date_create($dob_15),"Y-m-d");
			$householdMember -> civil_reg_16 = $civil_reg_16;
			$householdMember -> stats_17 = $stats_17;
			$householdMember -> mem_18 = $mem_18;
			$householdMember -> ofw_19 = $ofw_19;
			$householdMember -> mem_20 = $mem_20;
			$householdMember -> mem_20_b = $mem_20_b;
			$householdMember -> d_21_schooling = $d_21_schooling;
			$householdMember -> d_22 = $d_22;
			$householdMember -> d_23 = $d_23;
			$householdMember -> d_24 = $d_24;
			$householdMember -> d_25_a = $d_25_a;
			$householdMember -> d_25_b = $d_25_b;
			$householdMember -> d_26 = $d_26;
			$householdMember -> f_27 = $f_27;
			$householdMember -> f_28 = $f_28;
			$householdMember -> f_29 = $f_29;
			$householdMember -> f_30 = $f_30;
			$householdMember -> f_40 = $f_40;
			$householdMember -> f_41 = $f_41;
			$householdMember -> f_42 = $f_42;
			$householdMember -> f_43 = $f_43;
			$householdMember -> f_44 = $f_44;
			$householdMember -> f_45 = $f_45;
			$householdMember -> f_46 = $f_46;
			$householdMember -> f_47 = $f_47;
			$householdMember -> f_31 = $f_31;
			$householdMember -> f_32 = $f_32;
			$householdMember -> f_33 = $f_33;
			$householdMember -> f_34 = $f_34;
			$householdMember -> f_35 = $f_35;
			$householdMember -> f_36 = $f_36;
			$householdMember -> f_37 = $f_37;
			$householdMember -> f_38 = $f_38;
			$householdMember -> f_39 = $f_39;
			$householdMember -> f_48_a = $f_48_a;
			$householdMember -> f_48_b = $f_48_b;
			$householdMember -> f_49 = $f_49;
			$householdMember -> g_50 = $g_50;
			$householdMember -> g_51 = $g_51;
			$householdMember -> g_52 = $g_52;
			$householdMember -> g_53 = $g_53;
			$householdMember -> g_53_b = $g_53_b;
			$householdMember -> g_54 = $g_54;
			$householdMember -> g_55 = $g_55;
			$householdMember -> g_58 = $g_58;
			$householdMember -> encoded_by = $encoded_by;

			if ($householdMember -> save())
			{
				return Response::json(array(
		                    'status'  => 'success',
		                    'message'  => 'New household member is successfully added.',
		                ));
			}
			else
			{
				return  Response::json(array(
		                    'status'  => 'fail',
		                    'message'  => 'An error occured while adding the new household member to the record. Please try again.',
		                ));
			}
		}
    }

    function houdeholdUrlGenerator()
    {
    	$cid = Request::get('cid');
    	return URL::Route('getRecord',$cid);
    }

    function generateHMemberUrl()
    {
    	$cid = Request::get('cid');
    	return URL::Route('getMembers',$cid);
    }
}
