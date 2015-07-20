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
		
		if ( isset($_GET["access"]) && $_GET["access"] == "true" ) {
			if ( Session::has('demo') ) {
				$newReleases = DB::table("media")->where("newRelease", 1)->where("active", 1)->where("demo", 1)->orderBy("category", "title")->get();
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

}
