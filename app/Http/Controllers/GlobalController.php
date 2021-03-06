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
use Carbon\carbon;

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

	public function householdMemInfo()
	{
		$cid = Request::get("cid");
		return HouseholdMember::find($cid);
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
					"link" => URL::route('brgySummary',[$brgyListi['id'] , date("Y")]),
				);
			}
		}

		return $response;
	}

	//Date range tracker (Drt)
	//under age of given param
	public function drtAge($age)
	{
		return array (
				'rangeFrom' => Carbon::today()->subYears($age+1)->addDay()->toDateString(),
				'rangeTo'	=> Carbon::today()->toDateString(),
			); 
	}

	//Date range tracker (Drt)
	//between two age of given param
	public function drtAge2($ageFrom,$ageTo)
	{
		return array (
				'rangeFrom' => Carbon::today()->subYears($ageTo+1)->addDay()->toDateString(),
				'rangeTo'	=> Carbon::today()->subYears($ageFrom)->toDateString(),
			); 
	}

	public function proportionCalc($totala,$totalb)
	{
		if(empty($totala))
		{
			return 0;
		}
		$a = $totalb/$totala;
		$b = $a * 100;
		return round($b,1);
	}

	public function statisticSummarry($bid,$year)
	{
		
		//$response = array();
		$houseHoldList = Household::whereBrgy_id($bid)->select(array('id'))->whereYear('created_at', '=', $year)->get();
		$totalHouseHold = count($houseHoldList);
		$totalHouseHoldMember = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->count();
		//return $householdMember->whereSex_14(2)->count();
		$response = array(

		//demo'graphy
		0 => [$totalHouseHold,'d_1_a'],
		1 => ['','d_1_b'],
		2 => [$totalHouseHoldMember,'d_1_c'],
		3 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->whereSex_14(1)->count(),'d_1_d'],
		4 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->whereSex_14(2)->count(),'d_1_e'],
		5 => [$this->proportionCalc($totalHouseHoldMember,$totalHouseHoldMember),'d_1_f'],
		6 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->whereSex_14(1)->count()),'d_1_g'],
		7 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->whereSex_14(2)->count()),'d_1_h'],
		8 => [(!empty($totalHouseHoldMember)) ? round($totalHouseHoldMember/$totalHouseHold) : 0 ,'d_2_a'],
		9 => ['','d_2_b'],
		10 => ['','d_2_c'],
		11 => ['','d_2_d'],
		12 => ['','d_2_e'],
		13 => ['','d_2_f'],
		14 => ['','d_2_g'],
		15 => ['','d_2_h'],
		16 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->groupBy('Household_system_id')->count(),'d_3_a'],
		17 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->groupBy('Household_system_id')->count()),'d_3_b'],
		18 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->count(),'d_3_c'],
		19 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->whereSex_14(1)->count(),'d_3_d'],
		20 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->whereSex_14(2)->count(),'d_3_e'],
		21 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->count()),'d_3_f'],
		22 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->whereSex_14(1)->count()),'d_3_g'],
		23 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(1)['rangeFrom'])->where('dob_15','<=',$this->drtAge(1)['rangeTo'])->whereSex_14(2)->count()),'d_3_h'],
		24 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->groupBy('Household_system_id')->count(),'d_4_a'],
		25 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->groupBy('Household_system_id')->count()),'d_4_b'],
		26 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->count(),'d_4_c'],
		27 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->whereSex_14(1)->count(),'d_4_d'],
		28 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->whereSex_14(2)->count(),'d_4_e'],
		29 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->count()),'d_4_f'],
		30 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->whereSex_14(1)->count()),'d_4_g'],
		31 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge(5)['rangeFrom'])->where('dob_15','<=',$this->drtAge(5)['rangeTo'])->whereSex_14(2)->count()),'d_4_h'],
		32 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->groupBy('Household_system_id')->count(),'d_5_a'],
		33 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->groupBy('Household_system_id')->count()),'d_5_b'],
		34 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->count(),'d_5_c'],
		35 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->whereSex_14(1)->count(),'d_5_d'],
		36 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->whereSex_14(2)->count(),'d_5_e'],
		37 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->count()),'d_5_f'],
		38 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->whereSex_14(1)->count()),'d_5_g'],
		39 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(0,5)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(0,5)['rangeTo'])->whereSex_14(2)->count()),'d_5_h'],
		40 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->groupBy('Household_system_id')->count(),'d_6_a'],
		41 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->groupBy('Household_system_id')->count()),'d_6_b'],
		42 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->count(),'d_6_c'],
		43 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(1)->count(),'d_6_d'],
		44 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(2)->count(),'d_6_e'],
		45 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->count()),'d_6_f'],
		46 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(1)->count()),'d_6_g'],
		47 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(2)->count()),'d_6_h'],
		48 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->groupBy('Household_system_id')->count(),'d_7_a'],
		49 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->groupBy('Household_system_id')->count()),'d_7_b'],
		50 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->count(),'d_7_c'],
		51 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(1)->count(),'d_7_d'],
		52 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(2)->count(),'d_7_e'],
		53 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->count()),'d_7_f'],
		54 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(1)->count()),'d_7_g'],
		55 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(2)->count()),'d_7_h'],
		56 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->groupBy('Household_system_id')->count(),'d_8_a'],
		57 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->groupBy('Household_system_id')->count()),'d_8_b'],
		58 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->count(),'d_8_c'],
		59 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(1)->count(),'d_8_d'],
		60 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(2)->count(),'d_8_e'],
		61 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->count()),'d_8_f'],
		62 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(1)->count()),'d_8_g'],
		63 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(2)->count()),'d_8_h'],
		64 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->groupBy('Household_system_id')->count(),'d_9_a'],
		65 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->groupBy('Household_system_id')->count()),'d_9_b'],
		66 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->count(),'d_9_c'],
		67 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(1)->count(),'d_9_d'],
		68 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(2)->count(),'d_9_e'],
		69 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->count()),'d_9_f'],
		70 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(1)->count()),'d_9_g'],
		71 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(2)->count()),'d_9_h'],
		72 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->groupBy('Household_system_id')->count(),'d_10_a'],
		73 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->groupBy('Household_system_id')->count()),'d_10_b'],
		74 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->count(),'d_10_c'],
		75 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(1)->count(),'d_10_d'],
		76 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(2)->count(),'d_10_e'],
		77 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->count()),'d_10_f'],
		78 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(1)->count()),'d_10_g'],
		79 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(2)->count()),'d_10_h'],
		80 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->groupBy('Household_system_id')->count(),'d_11_a'],
		81 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->groupBy('Household_system_id')->count()),'d_11_b'],
		82 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->count(),'d_11_c'],
		83 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(1)->count(),'d_11_d'],
		84 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(2)->count(),'d_11_e'],
		85 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->count()),'d_11_f'],
		86 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(1)->count()),'d_11_g'],
		87 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(2)->count()),'d_11_h'],
		88 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->groupBy('Household_system_id')->count(),'d_12_a'],
		89 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->groupBy('Household_system_id')->count()),'d_12_b'],
		90 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->count(),'d_12_c'],
		91 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->whereSex_14(1)->count(),'d_12_d'],
		92 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->whereSex_14(2)->count(),'d_12_e'],
		93 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->count()),'d_12_f'],
		94 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->whereSex_14(1)->count()),'d_12_g'],
		95 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(10,1000)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(10,1000)['rangeTo'])->whereSex_14(2)->count()),'d_12_h'],
		96 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->groupBy('Household_system_id')->count(),'d_13_a'],
		97 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->groupBy('Household_system_id')->count()),'d_13_b'],
		98 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->count(),'d_13_c'],
		99 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->whereSex_14(1)->count(),'d_13_d'],
		100 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->whereSex_14(2)->count(),'d_13_e'],
		101 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->count()),'d_13_f'],
		102 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->whereSex_14(1)->count()),'d_13_g'],
		103 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',1)->whereSex_14(2)->count()),'d_13_h'],
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
		160 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count(),'be_1_a'],
		161 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count()),'be_1_b'],
		162 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereD_21_schooling(2)->count(),'be_1_c'],
		163 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count(),'be_1_d'],
		164 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count(),'be_1_e'],
		165 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereD_21_schooling(2)->count()),'be_1_f'],
		166 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count()),'be_1_g'],
		167 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,11)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,11)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count()),'be_1_h'],
		168 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count(),'be_2_a'],
		169 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count()),'be_2_b'],
		170 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereD_21_schooling(2)->count(),'be_2_c'],
		171 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count(),'be_2_d'],
		172 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count(),'be_2_e'],
		173 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereD_21_schooling(2)->count()),'be_2_f'],
		174 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count()),'be_2_g'],
		175 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,12)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,12)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count()),'be_2_h'],
		176 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count(),'be_3_a'],
		177 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count()),'be_3_b'],
		178 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereD_21_schooling(2)->count(),'be_3_c'],
		179 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count(),'be_3_d'],
		180 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count(),'be_3_e'],
		181 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereD_21_schooling(2)->count()),'be_3_f'],
		182 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count()),'be_3_g'],
		183 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(12,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(12,15)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count()),'be_3_h'],
		184 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count(),'be_4_a'],
		185 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count()),'be_4_b'],
		186 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereD_21_schooling(2)->count(),'be_4_c'],
		187 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count(),'be_4_d'],
		188 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count(),'be_4_e'],
		189 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereD_21_schooling(2)->count()),'be_4_f'],
		190 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count()),'be_4_g'],
		191 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(13,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(13,16)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count()),'be_4_h'],
		192 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count(),'be_5_a'],
		193 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count()),'be_5_b'],
		194 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereD_21_schooling(2)->count(),'be_5_c'],
		195 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count(),'be_5_d'],
		196 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count(),'be_5_e'],
		197 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereD_21_schooling(2)->count()),'be_5_f'],
		198 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count()),'be_5_g'],
		199 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,15)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,15)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count()),'be_5_h'],
		200 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count(),'be_6_a'],
		201 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereD_21_schooling(2)->groupBy('Household_system_id')->count()),'be_6_b'],
		202 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereD_21_schooling(2)->count(),'be_6_c'],
		203 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count(),'be_6_d'],
		204 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count(),'be_6_e'],
		205 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereD_21_schooling(2)->count()),'be_6_f'],
		206 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(1)->whereD_21_schooling(2)->count()),'be_6_g'],
		207 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(6,16)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(6,16)['rangeTo'])->whereSex_14(2)->whereD_21_schooling(2)->count()),'be_6_h'],
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
		//Employment
		248 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->groupBy('Household_system_id')->count(),'emp_1_a'],
		249 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->groupBy('Household_system_id')->count()),'emp_1_b'],
		250 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->count(),'emp_1_c'],
		251 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->whereSex_14(1)->count(),'emp_1_d'],
		252 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->whereSex_14(2)->count(),'emp_1_e'],
		253 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->count()),'emp_1_f'],
		254 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->whereSex_14(1)->count()),'emp_1_g'],
		255 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',2)->whereSex_14(2)->count()),'emp_1_h'],
		256 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->groupBy('Household_system_id')->count(),'emp_2_a'],
		257 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->groupBy('Household_system_id')->count()),'emp_2_b'],
		258 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->count(),'emp_2_c'],
		259 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->whereSex_14(1)->count(),'emp_2_d'],
		260 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->whereSex_14(2)->count(),'emp_2_e'],
		261 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->count()),'emp_2_f'],
		262 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->whereSex_14(1)->count()),'emp_2_g'],
		263 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',1)->whereSex_14(2)->count()),'emp_2_h'],
		//SeniorCitizens
		264 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->groupBy('Household_system_id')->count(),'d_14_a'],
		265 => [$this->proportionCalc($totalHouseHold,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->groupBy('Household_system_id')->count()),'d_14_b'],
		266 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->count(),'d_14_c'],
		267 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->whereSex_14(1)->count(),'d_14_d'],
		268 => [HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->whereSex_14(2)->count(),'d_14_e'],
		269 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->count()),'d_14_f'],
		270 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->whereSex_14(1)->count()),'d_14_g'],
		271 => [$this->proportionCalc($totalHouseHoldMember,HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2(60,150)['rangeFrom'])->where('dob_15','<=',$this->drtAge2(60,150)['rangeTo'])->whereSex_14(2)->count()),'d_14_h'],
		);

	return $response;
	}

	public function chartStatS()
	{
		$year = Request::get("year");
		$month = 1;
		//$leads = Leads::all();
		$data = array();
		for ($month = 1; $month < 13; $month++) { 
		   // $data[] = $month;
		    $data[] = count(HouseholdMember::whereYear('created_at', '=', $year)
              ->whereMonth('created_at', '=', $month)
              ->get());
		}
		return $data;
	}

	public function generateMonthlyGraph($houseHoldList,$sex,$type,$drtAgefrom,$drtAgeto)
	{
		$response = array();
		

		for ($i=1; $i <= 12; $i++) {
			switch ($type) {
				case 1:
						$response[$i-1] = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->whereSex_14($sex)->whereMonth('created_at', '=', $i)->count();
					break;
				case 2:
						$response[$i-1] = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge($drtAgefrom)['rangeFrom'])->where('dob_15','<=',$this->drtAge($drtAgefrom)['rangeTo'])->whereSex_14($sex)->whereMonth('created_at', '=', $i)->count();
					break;
				case 3:
						$response[$i-1] = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2($drtAgefrom,$drtAgeto)['rangeFrom'])->where('dob_15','<=',$this->drtAge2($drtAgefrom,$drtAgeto)['rangeTo'])->whereSex_14($sex)->whereMonth('created_at', '=', $i)->count();
					break;
				case 4:
						$response[$i-1] = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('dob_15','>=',$this->drtAge2($drtAgefrom,$drtAgeto)['rangeFrom'])->where('dob_15','<=',$this->drtAge2($drtAgefrom,$drtAgeto)['rangeTo'])->whereSex_14($sex)->whereD_21_schooling(2)->whereMonth('created_at', '=', $i)->count();
					break;
				case 5:
						$response[$i-1] = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('g_54','=',$drtAgefrom)->whereSex_14($sex)->whereMonth('created_at', '=', $i)->count();
					break;
				case 6:
					$response[$i-1] = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->where('f_29','=',$drtAgefrom)->whereSex_14($sex)->whereMonth('created_at', '=', $i)->count();
				break;
				default:
					# code...
					break;
			}
		}

		return $response;
	}

	public function generateGraph($bid,$year)
	{
		$houseHoldList = Household::whereBrgy_id($bid)->select(array('id'))->whereYear('created_at', '=', $year)->get();
		$totalHouseHoldMember = HouseholdMember::whereIn('Household_system_id', $houseHoldList)->count();

		$response = array(
			0 => [$this->generateMonthlyGraph($houseHoldList,1,1,0,0),$this->generateMonthlyGraph($houseHoldList,2,1,0,0)],
			1 => [$this->generateMonthlyGraph($houseHoldList,1,2,1,0),$this->generateMonthlyGraph($houseHoldList,2,2,1,0)],
			2 => [$this->generateMonthlyGraph($houseHoldList,1,2,5,0),$this->generateMonthlyGraph($houseHoldList,2,2,5,0)],
			3 => [$this->generateMonthlyGraph($houseHoldList,1,3,0,5),$this->generateMonthlyGraph($houseHoldList,2,3,0,5)],
			4 => [$this->generateMonthlyGraph($houseHoldList,1,3,6,11),$this->generateMonthlyGraph($houseHoldList,2,3,6,11)],
			5 => [$this->generateMonthlyGraph($houseHoldList,1,3,6,12),$this->generateMonthlyGraph($houseHoldList,2,3,6,12)],
			6 => [$this->generateMonthlyGraph($houseHoldList,1,3,12,15),$this->generateMonthlyGraph($houseHoldList,2,3,12,15)],
			7 => [$this->generateMonthlyGraph($houseHoldList,1,3,13,16),$this->generateMonthlyGraph($houseHoldList,2,3,13,16)],
			8 => [$this->generateMonthlyGraph($houseHoldList,1,3,6,15),$this->generateMonthlyGraph($houseHoldList,2,3,6,15)],
			9 => [$this->generateMonthlyGraph($houseHoldList,1,3,6,16),$this->generateMonthlyGraph($houseHoldList,2,3,6,16)],
			10 => [$this->generateMonthlyGraph($houseHoldList,1,3,6,1000),$this->generateMonthlyGraph($houseHoldList,2,3,6,1000)],
			11 => [$this->generateMonthlyGraph($houseHoldList,1,4,6,11),$this->generateMonthlyGraph($houseHoldList,2,4,6,11)],
			12 => [$this->generateMonthlyGraph($houseHoldList,1,4,6,12),$this->generateMonthlyGraph($houseHoldList,2,4,6,12)],
			13 => [$this->generateMonthlyGraph($houseHoldList,1,4,12,15),$this->generateMonthlyGraph($houseHoldList,2,4,12,15)],
			14 => [$this->generateMonthlyGraph($houseHoldList,1,4,13,16),$this->generateMonthlyGraph($houseHoldList,2,4,13,16)],
			15 => [$this->generateMonthlyGraph($houseHoldList,1,4,6,15),$this->generateMonthlyGraph($houseHoldList,2,4,6,15)],
			16 => [$this->generateMonthlyGraph($houseHoldList,1,4,6,16),$this->generateMonthlyGraph($houseHoldList,2,4,6,16)],
			17 => [$this->generateMonthlyGraph($houseHoldList,1,5,1,16),$this->generateMonthlyGraph($houseHoldList,2,5,1,16)],
			18 => [$this->generateMonthlyGraph($houseHoldList,1,3,60,150),$this->generateMonthlyGraph($houseHoldList,2,3,60,150)],
			19 => [$this->generateMonthlyGraph($houseHoldList,1,6,2,150),$this->generateMonthlyGraph($houseHoldList,2,6,2,150)],
			20 => [$this->generateMonthlyGraph($houseHoldList,1,6,1,150),$this->generateMonthlyGraph($houseHoldList,2,6,1,150)],
		);

		return $response;
	}
}