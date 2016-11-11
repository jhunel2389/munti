<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barangay;
use App\Models\SecretQuestion;
use App\Models\Household;
use App\Models\HouseholdMember;
use Auth;
use DB;
use Input;
use Response;
use Request;
use URL;


class GlobalController extends Controller {

	public function userInfoList($uid)
	{
		$id = (!empty($uid)) ? $uid : Request::get("uid");
		$userInfo = User::find($id);
		if(!empty($userInfo))
		{
			return array(
						"user_id" 		=> $userInfo['id'],
						"un"			=> $userInfo['username'],
						"fname"			=> $userInfo['fname'],
						"lname"			=> $userInfo['lname'],
						"dm"			=> $userInfo['created_at'],
						"lvl"			=> $userInfo['isAdmin'],
					);
		}
	}

	public function userlist()
	{
		$response = array();
		$userList = User::where('isAdmin','=',0)->get();//where('id','!=',Auth::User()['id'])->where('isAdmin','=',0)->get();
		//return $userList;
		if(!empty($userList))
		{
			foreach ($userList as $userListi) {
				$response[] = $this->userInfoList($userListi['id']);
			}

			return Response::json(array(
	            'status'  => 'success',
	            'userInfoList'  => $response,
	        ));
		}
		else
		{
			return Response::json(array(
	            'status'  => 'fail',
	            'message'  => 'The user record is empty or all user has been listed in the admin account.',
	        ));
		}
	}

	public function brgyInfo($cid)
	{
		$id = (!empty($cid)) ? $cid : Request::get("cid");
		return Barangay::find($id);
	}


	public function secretInfo($cid)
	{
		$id = (!empty($cid)) ? $cid : Request::get("cid");
		return SecretQuestion::find($id);
	}

	public function accountAccessChecker($event)
	{
		$event = (!empty($event)) ? $event : Request::get('event');
		$uaccess = Auth::User()['isAdmin'];
		if(($uaccess == 1 || $uaccess == 1) && ($event == "add" || $event == "update" || $event == "delete"))
		{
			return array(
                'status'  => 'success',
                'message'  => 'Permission granted.',
            );
		}
		else
		{
			return array(
                'status'  => 'fail',
                'message'  => 'You have no permission to add, update, and delete data or records.',
            );
		}
	}


	public function statsbox()
	{
		$response = array();
		$brgyList = Barangay::all();

		if(!empty($brgyList))
		{
			foreach ($brgyList as $brgyListi) {
				$total_pop = Household::whereBrgy_id($brgyListi['id'])->sum('c_10');
				$response[] = array(
					"total_population" => (!empty($total_pop)) ? $total_pop : 0,
					"brgy_name" => $brgyListi['name'],
					"link" => URL::route('brgySummary',$brgyListi['id']),
				);
			}
		}

		return $response;
	}

	public function statisticSummarry($bid)
	{
		$response = array();

		//demography
		$d_1_a = 0;
		$d_1_b = 0;
		$d_1_c = 0;
		$d_1_d = 0;
		$d_1_e = 0;
		$d_1_f = 0;
		$d_1_g = 0;
		$d_1_h = 0;
		$d_2_a = 0;
		$d_2_b = 0;
		$d_2_c = 0;
		$d_2_d = 0;
		$d_2_e = 0;
		$d_2_f = 0;
		$d_2_g = 0;
		$d_2_h = 0;
		$d_3_a = 0;
		$d_3_b = 0;
		$d_3_c = 0;
		$d_3_d = 0;
		$d_3_e = 0;
		$d_3_f = 0;
		$d_3_g = 0;
		$d_3_h = 0;
		$d_4_a = 0;
		$d_4_b = 0;
		$d_4_c = 0;
		$d_4_d = 0;
		$d_4_e = 0;
		$d_4_f = 0;
		$d_4_g = 0;
		$d_4_h = 0;
		$d_5_a = 0;
		$d_5_b = 0;
		$d_5_c = 0;
		$d_5_d = 0;
		$d_5_e = 0;
		$d_5_f = 0;
		$d_5_g = 0;
		$d_5_h = 0;
		$d_6_a = 0;
		$d_6_b = 0;
		$d_6_c = 0;
		$d_6_d = 0;
		$d_6_e = 0;
		$d_6_f = 0;
		$d_6_g = 0;
		$d_6_h = 0;
		$d_7_a = 0;
		$d_7_b = 0;
		$d_7_c = 0;
		$d_7_d = 0;
		$d_7_e = 0;
		$d_7_f = 0;
		$d_7_g = 0;
		$d_7_h = 0;
		$d_8_a = 0;
		$d_8_b = 0;
		$d_8_c = 0;
		$d_8_d = 0;
		$d_8_e = 0;
		$d_8_f = 0;
		$d_8_g = 0;
		$d_8_h = 0;
		$d_9_a = 0;
		$d_9_b = 0;
		$d_9_c = 0;
		$d_9_d = 0;
		$d_9_e = 0;
		$d_9_f = 0;
		$d_9_g = 0;
		$d_9_h = 0;
		$d_10_a = 0;
		$d_10_b = 0;
		$d_10_c = 0;
		$d_10_d = 0;
		$d_10_e = 0;
		$d_10_f = 0;
		$d_10_g = 0;
		$d_10_h = 0;
		$d_11_a = 0;
		$d_11_b = 0;
		$d_11_c = 0;
		$d_11_d = 0;
		$d_11_e = 0;
		$d_11_f = 0;
		$d_11_g = 0;
		$d_11_h = 0;
		$d_12_a = 0;
		$d_12_b = 0;
		$d_12_c = 0;
		$d_12_d = 0;
		$d_12_e = 0;
		$d_12_f = 0;
		$d_12_g = 0;
		$d_12_h = 0;
		$d_13_a = 0;
		$d_13_b = 0;
		$d_13_c = 0;
		$d_13_d = 0;
		$d_13_e = 0;
		$d_13_f = 0;
		$d_13_g = 0;
		$d_13_h = 0;

		//health and nutrition
		$han_1_a = 0;
		$han_1_b = 0;
		$han_1_c = 0;
		$han_1_d = 0;
		$han_1_e = 0;
		$han_1_f = 0;
		$han_1_g = 0;
		$han_1_h = 0;
		$han_2_a = 0;
		$han_2_b = 0;
		$han_2_c = 0;
		$han_2_d = 0;
		$han_2_e = 0;
		$han_2_f = 0;
		$han_2_g = 0;
		$han_2_h = 0;
		$han_3_a = 0;
		$han_3_b = 0;
		$han_3_c = 0;
		$han_3_d = 0;
		$han_3_e = 0;
		$han_3_f = 0;
		$han_3_g = 0;
		$han_3_h = 0;

		//housing
		$h_1_a = 0;
		$h_1_b = 0;
		$h_1_c = 0;
		$h_1_d = 0;
		$h_1_e = 0;
		$h_1_f = 0;
		$h_1_g = 0;
		$h_1_h = 0;
		$h_2_a = 0;
		$h_2_b = 0;
		$h_2_c = 0;
		$h_2_d = 0;
		$h_2_e = 0;
		$h_2_f = 0;
		$h_2_g = 0;
		$h_2_h = 0;

		//water and sanitation
		$was_1_a = 0;
		$was_1_b = 0;
		$was_1_c = 0;
		$was_1_d = 0;
		$was_1_e = 0;
		$was_1_f = 0;
		$was_1_g = 0;
		$was_1_h = 0;
		$was_2_a = 0;
		$was_2_b = 0;
		$was_2_c = 0;
		$was_2_d = 0;
		$was_2_e = 0;
		$was_2_f = 0;
		$was_2_g = 0;
		$was_2_h = 0;

		//basic education
		$be_1_a = 0;
		$be_1_b = 0;
		$be_1_c = 0;
		$be_1_d = 0;
		$be_1_e = 0;
		$be_1_f = 0;
		$be_1_g = 0;
		$be_1_h = 0;
		$be_2_a = 0;
		$be_2_b = 0;
		$be_2_c = 0;
		$be_2_d = 0;
		$be_2_e = 0;
		$be_2_f = 0;
		$be_2_g = 0;
		$be_2_h = 0;
		$be_3_a = 0;
		$be_3_b = 0;
		$be_3_c = 0;
		$be_3_d = 0;
		$be_3_e = 0;
		$be_3_f = 0;
		$be_3_g = 0;
		$be_3_h = 0;
		$be_4_a = 0;
		$be_4_b = 0;
		$be_4_c = 0;
		$be_4_d = 0;
		$be_4_e = 0;
		$be_4_f = 0;
		$be_4_g = 0;
		$be_4_h = 0;
		$be_5_a = 0;
		$be_5_b = 0;
		$be_5_c = 0;
		$be_5_d = 0;
		$be_5_e = 0;
		$be_5_f = 0;
		$be_5_g = 0;
		$be_5_h = 0;
		$be_6_a = 0;
		$be_6_b = 0;
		$be_6_c = 0;
		$be_6_d = 0;
		$be_6_e = 0;
		$be_6_f = 0;
		$be_6_g = 0;
		$be_6_h = 0;

		//income and livelihood
		$ial_1_a = 0;
		$ial_1_b = 0;
		$ial_1_c = 0;
		$ial_1_d = 0;
		$ial_1_e = 0;
		$ial_1_f = 0;
		$ial_1_g = 0;
		$ial_1_h = 0;
		$ial_2_a = 0;
		$ial_2_b = 0;
		$ial_2_c = 0;
		$ial_2_d = 0;
		$ial_2_e = 0;
		$ial_2_f = 0;
		$ial_2_g = 0;
		$ial_2_h = 0;
		$ial_3_a = 0;
		$ial_3_b = 0;
		$ial_3_c = 0;
		$ial_3_d = 0;
		$ial_3_e = 0;
		$ial_3_f = 0;
		$ial_3_g = 0;
		$ial_3_h = 0;
		$ial_4_a = 0;
		$ial_4_b = 0;
		$ial_4_c = 0;
		$ial_4_d = 0;
		$ial_4_e = 0;
		$ial_4_f = 0;
		$ial_4_g = 0;
		$ial_4_h = 0;

		//peace and order
		$pao_1_a = 0;
		$pao_1_b = 0;
		$pao_1_c = 0;
		$pao_1_d = 0;
		$pao_1_e = 0;
		$pao_1_f = 0;
		$pao_1_g = 0;
		$pao_1_h = 0;
	}
}