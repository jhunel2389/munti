<?php 
namespace App\Http\Controllers;

use View;
use Auth;
use Shinobi;
use App;
use Redirect;

class HomeController extends Controller {

	public function index()
	{
		$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		if(Auth::Check())
		{
			return View::Make("home.index")->with("userInfo",$userInfo)->with('mt','db');
		}
		else
		{
			return View::Make("user.login");
		}

	}

}