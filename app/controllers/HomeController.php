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
		$newReleases = DB::table("media")->where("newRelease", 1)->where("active", 1)->orderBy("title")->get();
		
		$view = View::make('home')
			->with("newReleases", $newReleases);
		return $view;
	}

}
