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
		//$response = array();

		

		$response = array(

			//demo'graphy
			0 => [143,'d_1_a'],
			1 => [12,'d_1_b'],
			2 => [0,'d_1_c'],
			3 => [0,'d_1_d'],
			4 => [0,'d_1_e'],
			5 => [0,'d_1_f'],
			6 => [0,'d_1_g'],
			7 => [0,'d_1_h'],
			8 => [0,'d_2_a'],
			9 => [0,'d_2_b'],
			10 => [0,'d_2_c'],
			11 => [0,'d_2_d'],
			12 => [0,'d_2_e'],
			13 => [0,'d_2_f'],
			14 => [0,'d_2_g'],
			15 => [0,'d_2_h'],
			16 => [0,'d_3_a'],
			17 => [0,'d_3_b'],
			18 => [0,'d_3_c'],
			19 => [0,'d_3_d'],
			20 => [0,'d_3_e'],
			21 => [0,'d_3_f'],
			22 => [0,'d_3_g'],
			23 => [0,'d_3_h'],
			24 => [0,'d_4_a'],
			25 => [0,'d_4_b'],
			26 => [0,'d_4_c'],
			27 => [0,'d_4_d'],
			28 => [0,'d_4_e'],
			29 => [0,'d_4_f'],
			30 => [0,'d_4_g'],
			31 => [0,'d_4_h'],
			32 => [0,'d_5_a'],
			33 => [0,'d_5_b'],
			34 => [0,'d_5_c'],
			35 => [0,'d_5_d'],
			36 => [0,'d_5_e'],
			37 => [0,'d_5_f'],
			38 => [0,'d_5_g'],
			39 => [0,'d_5_h'],
			40 => [0,'d_6_a'],
			41 => [0,'d_6_b'],
			42 => [0,'d_6_c'],
			43 => [0,'d_6_d'],
			44 => [0,'d_6_e'],
			45 => [0,'d_6_f'],
			46 => [0,'d_6_g'],
			47 => [0,'d_6_h'],
			48 => [0,'d_7_a'],
			49 => [0,'d_7_b'],
			50 => [0,'d_7_c'],
			51 => [0,'d_7_d'],
			52 => [0,'d_7_e'],
			53 => [0,'d_7_f'],
			54 => [0,'d_7_g'],
			55 => [0,'d_7_h'],
			56 => [0,'d_8_a'],
			57 => [0,'d_8_b'],
			58 => [0,'d_8_c'],
			59 => [0,'d_8_d'],
			60 => [0,'d_8_e'],
			61 => [0,'d_8_f'],
			62 => [0,'d_8_g'],
			63 => [0,'d_8_h'],
			64 => [0,'d_9_a'],
			65 => [0,'d_9_b'],
			66 => [0,'d_9_c'],
			67 => [0,'d_9_d'],
			68 => [0,'d_9_e'],
			69 => [0,'d_9_f'],
			70 => [0,'d_9_g'],
			71 => [0,'d_9_h'],
			72 => [0,'d_10_a'],
			73 => [0,'d_10_b'],
			74 => [0,'d_10_c'],
			75 => [0,'d_10_d'],
			76 => [0,'d_10_e'],
			77 => [0,'d_10_f'],
			78 => [0,'d_10_g'],
			79 => [0,'d_10_h'],
			80 => [0,'d_11_a'],
			81 => [0,'d_11_b'],
			82 => [0,'d_11_c'],
			83 => [0,'d_11_d'],
			84 => [0,'d_11_e'],
			85 => [0,'d_11_f'],
			86 => [0,'d_11_g'],
			87 => [0,'d_11_h'],
			88 => [0,'d_12_a'],
			89 => [0,'d_12_b'],
			90 => [0,'d_12_c'],
			91 => [0,'d_12_d'],
			92 => [0,'d_12_e'],
			93 => [0,'d_12_f'],
			94 => [0,'d_12_g'],
			95 => [0,'d_12_h'],
			96 => [0,'d_13_a'],
			97 => [0,'d_13_b'],
			98 => [0,'d_13_c'],
			99 => [0,'d_13_d'],
			100 => [0,'d_13_e'],
			101 => [0,'d_13_f'],
			102 => [0,'d_13_g'],
			103 => [0,'d_13_h'],
			//health and nutrition,
			104 => [0,'han_1_a'],
			105 => [0,'han_1_b'],
			106 => [0,'han_1_c'],
			107 => [0,'han_1_d'],
			108 => [0,'han_1_e'],
			109 => [0,'han_1_f'],
			110 => [0,'han_1_g'],
			111 => [0,'han_1_h'],
			112 => [0,'han_2_a'],
			113 => [0,'han_2_b'],
			114 => [0,'han_2_c'],
			115 => [0,'han_2_d'],
			116 => [0,'han_2_e'],
			117 => [0,'han_2_f'],
			118 => [0,'han_2_g'],
			119 => [0,'han_2_h'],
			120 => [0,'han_3_a'],
			121 => [0,'han_3_b'],
			122 => [0,'han_3_c'],
			123 => [0,'han_3_d'],
			124 => [0,'han_3_e'],
			125 => [0,'han_3_f'],
			126 => [0,'han_3_g'],
			127 => [0,'han_3_h'],
			//housing,
			128 => [0,'h_1_a'],
			129 => [0,'h_1_b'],
			130 => [0,'h_1_c'],
			131 => [0,'h_1_d'],
			132 => [0,'h_1_e'],
			133 => [0,'h_1_f'],
			134 => [0,'h_1_g'],
			135 => [0,'h_1_h'],
			136 => [0,'h_2_a'],
			137 => [0,'h_2_b'],
			138 => [0,'h_2_c'],
			139 => [0,'h_2_d'],
			140 => [0,'h_2_e'],
			141 => [0,'h_2_f'],
			142 => [0,'h_2_g'],
			143 => [0,'h_2_h'],
			//water and sanitation,
			144 => [0,'was_1_a'],
			145 => [0,'was_1_b'],
			146 => [0,'was_1_c'],
			147 => [0,'was_1_d'],
			148 => [0,'was_1_e'],
			149 => [0,'was_1_f'],
			150 => [0,'was_1_g'],
			151 => [0,'was_1_h'],
			152 => [0,'was_2_a'],
			153 => [0,'was_2_b'],
			154 => [0,'was_2_c'],
			155 => [0,'was_2_d'],
			156 => [0,'was_2_e'],
			157 => [0,'was_2_f'],
			158 => [0,'was_2_g'],
			159 => [0,'was_2_h'],
			//basic education,
			160 => [0,'be_1_a'],
			161 => [0,'be_1_b'],
			162 => [0,'be_1_c'],
			163 => [0,'be_1_d'],
			164 => [0,'be_1_e'],
			165 => [0,'be_1_f'],
			166 => [0,'be_1_g'],
			167 => [0,'be_1_h'],
			168 => [0,'be_2_a'],
			169 => [0,'be_2_b'],
			170 => [0,'be_2_c'],
			171 => [0,'be_2_d'],
			172 => [0,'be_2_e'],
			173 => [0,'be_2_f'],
			174 => [0,'be_2_g'],
			175 => [0,'be_2_h'],
			176 => [0,'be_3_a'],
			177 => [0,'be_3_b'],
			178 => [0,'be_3_c'],
			179 => [0,'be_3_d'],
			180 => [0,'be_3_e'],
			181 => [0,'be_3_f'],
			182 => [0,'be_3_g'],
			183 => [0,'be_3_h'],
			184 => [0,'be_4_a'],
			185 => [0,'be_4_b'],
			186 => [0,'be_4_c'],
			187 => [0,'be_4_d'],
			188 => [0,'be_4_e'],
			189 => [0,'be_4_f'],
			190 => [0,'be_4_g'],
			191 => [0,'be_4_h'],
			192 => [0,'be_5_a'],
			193 => [0,'be_5_b'],
			194 => [0,'be_5_c'],
			195 => [0,'be_5_d'],
			196 => [0,'be_5_e'],
			197 => [0,'be_5_f'],
			198 => [0,'be_5_g'],
			199 => [0,'be_5_h'],
			200 => [0,'be_6_a'],
			201 => [0,'be_6_b'],
			202 => [0,'be_6_c'],
			203 => [0,'be_6_d'],
			204 => [0,'be_6_e'],
			205 => [0,'be_6_f'],
			206 => [0,'be_6_g'],
			207 => [0,'be_6_h'],
			//income and livelihood
			208 => [0,'ial_1_a'],
			209 => [0,'ial_1_b'],
			210 => [0,'ial_1_c'],
			211 => [0,'ial_1_d'],
			212 => [0,'ial_1_e'],
			213 => [0,'ial_1_f'],
			214 => [0,'ial_1_g'],
			215 => [0,'ial_1_h'],
			216 => [0,'ial_2_a'],
			217 => [0,'ial_2_b'],
			218 => [0,'ial_2_c'],
			219 => [0,'ial_2_d'],
			220 => [0,'ial_2_e'],
			221 => [0,'ial_2_f'],
			222 => [0,'ial_2_g'],
			223 => [0,'ial_2_h'],
			224 => [0,'ial_3_a'],
			225 => [0,'ial_3_b'],
			226 => [0,'ial_3_c'],
			227 => [0,'ial_3_d'],
			228 => [0,'ial_3_e'],
			229 => [0,'ial_3_f'],
			230 => [0,'ial_3_g'],
			231 => [0,'ial_3_h'],
			232 => [0,'ial_4_a'],
			233 => [0,'ial_4_b'],
			234 => [0,'ial_4_c'],
			235 => [0,'ial_4_d'],
			236 => [0,'ial_4_e'],
			237 => [0,'ial_4_f'],
			238 => [0,'ial_4_g'],
			239 => [0,'ial_4_h'],
			//peace and 'or>de
			240 => [0,'pao_1_a'],
			241 => [0,'pao_1_b'],
			242 => [0,'pao_1_c'],
			243 => [0,'pao_1_d'],
			244 => [0,'pao_1_e'],
			245 => [0,'pao_1_f'],
			246 => [0,'pao_1_g'],
			247 => [0,'pao_1_h'],

		);

	return $response;
	}
}