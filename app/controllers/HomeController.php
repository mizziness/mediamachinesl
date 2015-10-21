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
	
	public function connect() {
		// Valid creators == 833662ff-b2be-4ea9-9123-47d683fcfc4a (Jim), 5e5e664b-2b07-4259-b3d3-a2675b982855 (Mizzy), eccbf153-e801-4a3e-a1ae-acc8438704a7 (Lisa)
		//$object = $_GET["objectName"];
		//$owner = $_GET["objectOwner"];
		//$userAgent = $_SERVER['HTTP_USER_AGENT'];
		$creator = "";
		
		if ( isset($_GET["objectCreator"]) ) {
			$creator = $_GET["objectCreator"];
		}		
		
		if ( $creator == "833662ff-b2be-4ea9-9123-47d683fcfc4a" || $creator == "5e5e664b-2b07-4259-b3d3-a2675b982855" || $creator == "eccbf153-e801-4a3e-a1ae-acc8438704a7" ) {
			// Valid Unit
			Session::put('valid', true);			
		} else {
			Session::forget('valid');
		}
		return Redirect::action('HomeController@init');
	}

}
