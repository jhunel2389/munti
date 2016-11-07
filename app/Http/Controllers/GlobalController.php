<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barangay;
use Auth;
use DB;
use Input;
use Response;
use Request;

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
}