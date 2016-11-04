<?php 
namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\User;
use App\Models\PasswordRecovery;
use Validator;
use Response;
use Auth;
use Redirect;
use View;
use DateTime;
use Request;
use Hash;
use URL;
use Mail;
use App;
class UserController extends Controller {

	public function getLogin()
	{
		return Redirect::route('index');
	}

	public function getRegister()
	{
		return view::make('user.register');
	}
	
	public function postLogin()
	{
		$validator = Validator::make(Request::all(), array(
			'txtUsername' => 'required',
			'txtPassword' => 'required'
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
			$remember = (Request::has('remember')) ? true : false;
			$auth = Auth::attempt(array(
				'username' => Request::get('txtUsername'),
				'password' => Request::get('txtPassword'),
			), $remember);

			if($auth)
			{
				return 1;
			}
			else
			{
				return  Response::json(array(
                    'status'  => 'fail',
                    'message'  => 'You input invalid credentials. Please Try again.',
                ));
			}

		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('index');
	}

	public function getUAL()
	{
		$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		return View::Make("uam.ual")->with("userInfo",$userInfo)->with('mt','uam')->with('cc','ual');
	}

	public function adminUserList()
	{
		$response = array();
		$userAdmins = User::where("isAdmin","!=",0)->select('id')->lists('id');
		if(!empty($userAdmins))
		{
			foreach ($userAdmins as $userAdmin) {
				$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList($userAdmin);
				if(!empty($userInfo))
				{
					$response[] = $userInfo;
				}
			}
		}
		return $response;
	}

	//userAdminAccessLvl
	public function uaal() 
	{
		$response = array();
		$id = Request::get("uid");
		if(!empty($id))
		{
			$response = array(
				"uinfo" => App::make("App\Http\Controllers\GlobalController")->userInfoList($id),
			);
		}
		return $response;
	}

	public function addAdmin()
	{
		$uid = Request::get('uid');
		$role = Request::get('role');
		$userCheck = User::where("id","=",$uid)->where("isAdmin","=",0)->first();
		if(!empty($userCheck))
		{
			$userCheck['isAdmin'] = $role;
			if($userCheck->save())
			{
				return Response::json(array(
		            'status'  => 'success',
		            'message'  => 'You successfully added new admin.',
		        ));
			}
			return Response::json(array(
	            'status'  => 'fail',
	            'message'  => 'Fail to add new admin. System has encounter unnecessary error. Please Try again.',
	        ));
		}
		else
		{
			return Response::json(array(
	            'status'  => 'fail',
	            'message'  => 'The user that are you trying to add is already in the admin. You can search it on the table below and update there access.',
	        ));
		}
	}

	public function updateAdmin()
	{
		$uid = Request::get('uid');
		$role = Request::get('role');
		$roleChecker = User::where("id","=",$uid)->where("isAdmin","!=",0)->first();
		if(!empty($roleChecker))
		{
			$roleChecker['isAdmin'] = $role;
			if($roleChecker->save())
			{
				return Response::json(array(
		            'status'  => 'success',
		            'message'  => 'You successfully update the particular admin.',
		        ));
			}
			return Response::json(array(
	            'status'  => 'fail',
	            'message'  => 'Fail to update admin user. System has encounter unnecessary error. Please Try again.',
	        ));
		}
		else
		{
			return Response::json(array(
	            'status'  => 'fail',
	            'message'  => 'The user that are you trying to update is not yet in the admin record. Please check and try again.',
	        ));
		}
	}


		public function postCreate()
	{
		$email = Input::get('email');
		$username = Input::get('username');
		$password = Input::get('password');
		$fname = Input::get('fname');
		$lname = Input::get('lname');
		$gender = Input::get('gender');
		$dob = Input::get('dob');
		$mobile = Input::get('mobile');
		$address = Input::get('address');

		$validator = Validator::make(Input::all(), array(
			'email' => 'required',
			'username' => 'required',
			'password' => 'required',
			'fname' => 'required',
			'lname' => 'required',
			'gender' => 'required',
			'dob' => 'required',
			'mobile' => 'required',
			'address' => 'required'
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
			$result1 = User::where('username','=',$username)->first();
			$result2 = User::where('email','=',$email)->first();

			if(empty($result1) && empty($result2))
			{
				$date = new DateTime();
				$vCode = date_format($date, 'U').str_random(110);		
				$user = new User();
				$user -> username = Input::get('username');
				$user -> password = Hash::make(Input::get('password'));
				$user -> email = $email;
				$user -> Vcode = $vCode;
				
				if ($user -> save())
				{
					return Response::json(array(
			                    'status'  => 'success',
			                    'message'  => 'Please check your email to verify your e-mail.Thank you.',
			                ));
				}
				else
				{
					return  Response::json(array(
			                    'status'  => 'fail',
			                    'message'  => 'An error occured while creating the user. Please try again.',
			                ));
				}
			}
			else
			{
				return  Response::json(array(
			                    'status'  => 'fail',
			                    'message'  => 'Your email/username has already taken. Please Try again',
			                ));
			}
		}
	}
}