<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function init() {
		if ( isset($_GET["demo"]) ) {
			// Demo HUD - hide content!
			Session::put('demo', true);
		} else {
			Session::forget('demo');
		}
		
		if ( isset($_GET["musicOnly"]) ) {
			// Demo HUD - hide content!
			Session::put('musicOnly', true);
		} else {
			Session::forget('musicOnly');
		}
		
		if ( !Session::has("customerID") && !Session::has("tempPlayer") ) {
			Session::put("tempPlayer", Input::get("player"));
		} else {
			Session::forget("tempPlayer");
		}
		
		if ( (isset($_GET["access"]) && $_GET["access"] == "true") || Session::has('valid') ) {
			if ( Session::has('demo') ) {
				$newReleases = DB::table("media")->where("active", 1)->where("demo", 1)->orderBy("category", "title")->get();
			} else if ( Session::has('musicOnly') ) {
				$newReleases = DB::table("media")->where("category", "radio")->where("active", 1)->orderBy("title")->get();
			} else {
				$newReleases = DB::table("media")->where("newRelease", 1)->where("active", 1)->orderBy("title")->get();
			}
			
			$view = View::make('home')->with("newReleases", $newReleases);			
		} else {
			$view = View::make('denied');	
		}
		return $view;
	}
	
	public function help() {
		$view = View::make('help');
		return $view;		
	}
	
	public function settings() {
		$customer = NULL;
		$tv = NULL;
		if ( Session::has("customerID") ) {
			$customer = DB::table("customers")->where("id", Session::get("customerID"))->first();
			$tv = DB::table("tvs")->where("customerID", Session::get("customerID"))->first();
		}
		$view = View::make('settings')->with("customer", $customer)->with("tv", $tv);
		return $view;		
	}
	
	public function saveSettings($customerID) {	
		if ( $customerID > 0 && Input::get("player") ) {
			Session::forget("tempPlayer");
			$playerChoice = Input::get("player");
			DB::table("customers")->where("id", $customerID)->update(array("optionPlayer" => $playerChoice));
		} else {
			Session::put("tempPlayer", Input::get("player"));
		}
		
		return Redirect::action('HomeController@settings')->with("message", "Setting saved!");			
	}
	
	public function connect() {
		// Valid creators == 833662ff-b2be-4ea9-9123-47d683fcfc4a (Jim), 5e5e664b-2b07-4259-b3d3-a2675b982855 (Mizzy), eccbf153-e801-4a3e-a1ae-acc8438704a7 (Lisa)
		
		//$object = $_GET["objectName"];
		//$owner = $_GET["objectOwner"];
		//$userAgent = $_SERVER['HTTP_USER_AGENT'];
		
		$creator = "";
		
		if ( isset($_GET["objectCreator"]) ) {
			$creator = $_GET["objectCreator"];
		}
		
		if ( isset($_GET["objectOwner"]) && isset($_GET["objectName"]) && isset($_GET["objectCreator"]) ) {
			$customer = array (
				"slname" => Helpers::getSLName($_GET["objectOwner"]),
				"slkey" => $_GET["objectOwner"]
			);
			$customerID = Helpers::addCustomer($customer);
			
			$tv = array(
				"customerID" => $customerID,
				"ownerName" => Helpers::getSLName($_GET["objectOwner"]),
				"ownerKey" => $_GET["objectOwner"],
				"version" => "2.3",
				"status" => "active"
			);
			$tvID = Helpers::addTV($tv);
		}
		
		if ( $creator == "833662ff-b2be-4ea9-9123-47d683fcfc4a" || $creator == "5e5e664b-2b07-4259-b3d3-a2675b982855" || $creator == "eccbf153-e801-4a3e-a1ae-acc8438704a7" || $_GET["objectOwner"] == "5e5e664b-2b07-4259-b3d3-a2675b982855" ) {
			// Valid Unit
			Session::put('valid', true);			
		} else {
			Session::forget('valid');
		}
		return Redirect::action('HomeController@init');
	}

}
