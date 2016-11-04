<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App;
use View;

class RecordController extends Controller
{
    function getRecord()
    {
    	$userInfo = App::make("App\Http\Controllers\GlobalController")->userInfoList(Auth::User()['id']);
		return View::Make("records.record")->with("userInfo",$userInfo)->with('mt','re');
    }

    function addRecord()
    {
    	
    }
}
